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
use App\Http\Controllers\Controller;
use App\Http\Requests\DataWargaRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

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
            $query = Data_warga::all();

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
                ->rawColumns(['action'])
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
        $data['foto_kk'] = $request->file('foto_kk')->store('datawarga/foto_kk', 'public');

        if($request->hasFile('foto_paspor')){
            $data['foto_paspor'] = $request->file('foto_paspor')->store('datawarga/foto_paspor', 'public');
        }

        $tanggal = new DateTime($request->tanggal_lahir);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;

        if($y < 18){
            $data['kategori_usia'] = 'anak';
        }else{
            $data['kategori_usia'] = 'dewasa';
        }

        dd($y);

        //Data_warga::create($data);
        //return redirect()->route('DataWarga.index')->with('success', 'Data Warga berhasil ditambahkan');
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
        $regencies = Kabupaten::where('id', $data->kabupaten)->get();
        $districts = Kecamatan::where('id', $data->kecamatan)->get();
        $villages = Kelurahan::where('id', $data->kelurahan)->get();
        return view('admin.warga.edit', [
            'data'      => $data,
            'religions' => Religions::all(),
            'provinces' => Provinsi::all(),
            'regencies' => $regencies,
            'districts' => $districts,
            'villages'  => $villages
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
        if($request->hasFile('foto_paspor')){
            Storage::delete('public/' . $cek->foto_paspor);
            $data['foto_paspor'] = $request->file('foto_paspor')->store('datawarga/foto_paspor', 'public');
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
        Storage::delete('public/' . $cek->foto_paspor);
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
}