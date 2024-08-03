<?php

namespace App\Http\Controllers\Admin;

use DateTime;
use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use App\Religions;
use App\Data_warga;
use Illuminate\Http\Request;
use App\Exports\DataWargaExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\DataWargaRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\DataWargaKategoriBalitaExport;
use App\Exports\DataWargaKategoriLansiaExport;
use App\Exports\DataWargaKategoriDisabilitasExport;
use App\Exports\DataWargaKategoriBantuanPemerintahExport;

class DataWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Data_warga::where('verification', '1')
                ->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success" href="' . route('DataWarga.show', $item->id) . '">
                            <i class="far fa-eye"></i> Detail
                        </a>
                        <a class="btn btn-primary" href="' . route('DataWarga.edit', $item->id) . '">
                            <i class="fas fa-pen"></i> Ubah
                        </a>
                        <button class="btn btn-danger delete_warga" data-id="' . $item->id . '">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    ';
                })
                ->editColumn('verification', function ($item) {
                    if ($item->verification == '0') {
                        return '<span class="rounded-pill badge badge-danger">Belum Verifikasi Data</span>';
                    }else{
                        return '<span class="rounded-pill badge badge-success">Sudah Verifikasi Data</span>';
                    }
                })
                ->rawColumns(['action', 'verification'])
                ->addIndexColumn()
                ->make();
        }
        return view('admin.warga.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $religions = Religions::all();
        $provinces = Provinsi::all();

        return view('admin.warga.create', [
            'religions' => $religions,
            'provinces'  => $provinces
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataWargaRequest $request)
    {
        $data = $request->all();
        $cek = Data_warga::where('nik', $data['nik'])->first();

        if($cek) {
            return redirect()->route('DataWarga.create')->with('error', 'Data Sudah Ada');
        }else{
            $data['foto_kk'] = $request->file('foto_kk')->store('datawarga/foto_kk', 'public');

            if($request->hasFile('foto_ktp')){
                $data['foto_ktp'] = $request->file('foto_ktp')->store('datawarga/foto_ktp', 'public');
            }

            $tanggal = new DateTime($request->tanggal_lahir);
            $today = new DateTime('today');
            $y = $today->diff($tanggal)->y;

            // dd($y);

            if($y >= 0 && $y <= 6){
                $data['kategori_usia'] = 'Balita';
            }elseif($y >= 7 && $y <= 12){
                $data['kategori_usia'] = 'Anak-anak';
            }elseif($y >= 13 && $y <= 18){
                $data['kategori_usia'] = 'Remaja';
            }elseif($y >= 19 && $y <= 59){
                $data['kategori_usia'] = 'Dewasa';
            }elseif($y >= 60 && $y <= 100){
                $data['kategori_usia'] = 'Lansia';
            }



            Data_warga::create($data);
            return redirect()->route('DataWarga.index')->with('success', 'Data Warga berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Data_warga::findOrFail($id);
        $religions = Religions::where('id', $data->religions_id)->first();
        $provinces = Provinsi::where('id', $data->provinsi)->first();
        $regencies = Kabupaten::where('id', $data->kabupaten)->first();
        $districts = Kecamatan::where('id', $data->kecamatan)->first();
        $villages = Kelurahan::where('id', $data->kelurahan)->first();

        if($data->status_dalam_keluarga == 0) {
            $sdk = 'Kepala Keluarga';
        }else if($data->status_dalam_keluarga == 1) {
            $sdk = 'Istri';
        }else if($data->status_dalam_keluarga == 2) {
            $sdk = 'Anak';
        }else if($data->status_dalam_keluarga == 3) {
            $sdk = 'Menantu';
        }else if($data->status_dalam_keluarga == 4) {
            $sdk = 'Cucu';
        }else if($data->status_dalam_keluarga == 5) {
            $sdk = 'Orang Tua';
        }else if($data->status_dalam_keluarga == 6) {
            $sdk = 'Mertua';
        }else if($data->status_dalam_keluarga == 7) {
            $sdk = 'Keluarga Lain';
        }else if($data->status_dalam_keluarga == 8) {
            $sdk = 'Pembantu';
        }else if($data->status_dalam_keluarga == 9) {
            $sdk = 'Lainnya';
        }else{
            $sdk = 'Tidak Ada';
        }

        return view('admin.warga.show', [
            'data'      => $data,
            'provinces' => $provinces,
            'regencies' => $regencies,
            'districts' => $districts,
            'villages'  => $villages,
            'religions' => $religions,
            'sdk'       => $sdk,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Data_warga::findOrFail($id);

        return view('admin.warga.edit', [
            'data'      => $data,
            'religions' => Religions::all(),
            'provinces' => Provinsi::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataWargaRequest $request, $id)
    {
        $cek = Data_warga::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('foto_kk')){
            Storage::delete('public/' . $cek->foto_kk);
            $data['foto_kk'] = $request->file('foto_kk')->store('datawarga/foto_kk', 'public');
        }
        if($request->hasFile('foto_ktp')){
            Storage::delete('public/' . $cek->foto_ktp);
            $data['foto_ktp'] = $request->file('foto_ktp')->store('datawarga/foto_ktp', 'public');
        }

        $tanggal = new DateTime($request->tanggal_lahir);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;

        if($y >= 1 && $y <= 6){
            $data['kategori_usia'] = 'Balita';
        }elseif($y >= 7 && $y <= 12){
            $data['kategori_usia'] = 'Anak-anak';
        }elseif($y >= 13 && $y <= 18){
            $data['kategori_usia'] = 'Remaja';
        }elseif($y >= 19 && $y <= 59){
            $data['kategori_usia'] = 'Dewasa';
        }elseif($y >= 60 && $y <= 100){
            $data['kategori_usia'] = 'Lansia';
        }

        $cek->update($data);
        return redirect()->route('DataWarga.index')->with('success', 'Data Warga berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Data_warga::findOrFail($id);
        Storage::delete('public/' . $cek->foto_kk);
        Storage::delete('public/' . $cek->foto_ktp);
        $cek->delete();

        return response()->json($cek);
    }

    public function getKabupaten($id) {
        $kabupaten = Kabupaten::where('id_prov', $id)->pluck('nama_dagri', 'id');
        return response()->json($kabupaten);
    }

    public function getKecamatan($id) {
        $kecamatan = Kecamatan::where('id_kab', $id)->pluck('nama_bps', 'id');
        return response()->json($kecamatan);
    }

    public function getKelurahan($id) {
        $kelurahan = Kelurahan::where('id_kec', $id)->pluck('nama_bps', 'id');
        return response()->json($kelurahan);
    }

    public function export()
    {
        return Excel::download(new DataWargaExport, 'DataWarga.xlsx');
    }

    public function exportBalita()
    {
        return Excel::download(new DataWargaKategoriBalitaExport, 'DataWargaKategoriBalita.xlsx');
    }

    public function exportLansia()
    {
        return Excel::download(new DataWargaKategoriLansiaExport, 'DataWargaKategoriLansia.xlsx');
    }

    public function exportDisabilitas()
    {
        return Excel::download(new DataWargaKategoriDisabilitasExport, 'DataWargaKategoriDisabilitas.xlsx');
    }

    public function exportBantuanPemerintah()
    {
        return Excel::download(new DataWargaKategoriBantuanPemerintahExport, 'DataWargaKategoriBantuanPemerintah.xlsx');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function verification($id)
    {
        $data = Data_warga::findOrFail($id);

        return view('admin.warga.verifikasi.edit', [
            'data'      => $data,
            'religions' => Religions::all(),
            'provinces' => Provinsi::all(),
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return void
     */
    public function updateVerification(Request $request, $id)
    {
        $cek = Data_warga::findOrFail($id);

        $cek->update([
            'verification' => $request['verification']
        ]);

//        return redirect()->route('DataWarga.index')->with('success', 'Data Warga berhasil diubah');
        return redirect()
            ->back()
            ->with('success', 'Berhasil Verifikasi');
    }
}
