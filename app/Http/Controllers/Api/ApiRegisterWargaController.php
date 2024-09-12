<?php

namespace App\Http\Controllers\Api;

use App\Data_warga;
use App\Http\Requests\ApiRegisterWargaRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use Exception;

class ApiRegisterWargaController extends Controller
{
    public function store(ApiRegisterWargaRequest $request)
    {
        try {
            $data = $request->all();
            $cek = Data_warga::where('nik', $data['nik'])->first();

            if ($cek) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data Sudah Ada'
                ], 400);
            } else {
                $data['foto_kk'] = $request->file('foto_kk')->store('datawarga/foto_kk', 'public');

                if ($request->hasFile('foto_ktp')) {
                    $data['foto_ktp'] = $request->file('foto_ktp')->store('datawarga/foto_ktp', 'public');
                }

                $tanggal = new DateTime($request->tanggal_lahir);
                $today = new DateTime('today');
                $y = $today->diff($tanggal)->y;

                if ($y >= 0 && $y <= 6) {
                    $data['kategori_usia'] = 'Balita';
                } elseif ($y >= 7 && $y <= 12) {
                    $data['kategori_usia'] = 'Anak-anak';
                } elseif ($y >= 13 && $y <= 18) {
                    $data['kategori_usia'] = 'Remaja';
                } elseif ($y >= 19 && $y <= 59) {
                    $data['kategori_usia'] = 'Dewasa';
                } elseif ($y >= 60 && $y <= 100) {
                    $data['kategori_usia'] = 'Lansia';
                }

                $warga = Data_warga::create($data);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Data Warga Berhasil Ditambahkan',
                    'data' => $warga
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}