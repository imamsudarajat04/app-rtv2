<?php

namespace App\Http\Controllers\Api;

use App\Data_warga;
use App\Http\Controllers\Controller;

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
}
