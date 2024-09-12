<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiStoreDataKematianRequest;
use Exception;
use App\Data_warga;
use App\DeathData;
use Illuminate\Http\Request;

class ApiStoreDataKematianController extends Controller
{
    public function store(ApiStoreDataKematianRequest $request)
    {
        try {
            $dataKematian = new DeathData();
            $dataKematian->no_akte_kematian = $request['no_akte_kematian'];
            $dataKematian->no_ktp = $request['no_ktp'];
            $dataKematian->name = $request['name'];
            $dataKematian->address = $request['address'];
            $dataKematian->save();

            if (!empty($request['no_ktp'])) {
                Data_warga::where('nik', $request['no_ktp'])
                    ->update([
                        "is_death" => true
                    ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No KTP tidak ditemukan!'
                ], 400);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Data Kematian Berhasil Ditambahkan',
                'data' => $dataKematian
            ]);
        } catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
