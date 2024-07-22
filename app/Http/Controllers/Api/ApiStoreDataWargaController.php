<?php

namespace App\Http\Controllers\Api;

use App\Data_warga;
use App\Http\Requests\DataWargaRequest;
use App\Http\Controllers\Controller;

class ApiStoreDataWargaController extends Controller
{
    public function store(DataWargaRequest $request)
    {
        $data = $request->all();
        $data['foto_kk'] = $request->file('foto_kk')->store('assets/foto_kk', 'public');
        $data['foto_ktp'] = $request->file('foto_ktp')->store('assets/foto_ktp', 'public');

        Data_warga::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Warga Berhasil Ditambahkan'
        ]);
    }
}
