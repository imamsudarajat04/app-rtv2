<?php

namespace App\Http\Controllers\Api;

use App\Data_warga;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApiDataWargaVerificationRequest;

class ApiGetDataWargaVerifController extends Controller
{
    public function index()
    {
        $getWargaVerif = Data_warga::where('verification', '1')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Warga Verifikasi',
            'data' => $getWargaVerif
        ]);
    }

    public function search(ApiDataWargaVerificationRequest $request)
    {
        try {
            $keywoard = $request->nik;
            $getWargaVerif = Data_warga::where('verification', '1')
                ->where('nik', 'like', '%' . $keywoard . '%')
                ->first();

            if (!$getWargaVerif) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Warga belum terverifikasi',
                    'data' => []
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Data Warga Verifikasi',
                'data' => $getWargaVerif
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
