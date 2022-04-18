<?php

namespace App\Http\Controllers\Admin;

use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use App\Religions;
use App\Data_warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataWargaRequest;
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
                        <a class="btn btn-success" href="">
                            <i class="far fa-eye"></i> Detail
                        </a>
                        <a class="btn btn-primary" href="' . route('DataRT.edit', $item->id) . '">
                            <i class="fas fa-pen"></i> Ubah
                        </a>
                        <button class="btn btn-danger delete_akun" data-id="' . $item->id . '">
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
        $data['foto_paspor'] = $request->file('foto_paspor')->store('datawarga/foto_paspor', 'public');

        Data_warga::create($data);
        return redirect()->route('DataWarga.index')->with('success', 'Data Warga berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
