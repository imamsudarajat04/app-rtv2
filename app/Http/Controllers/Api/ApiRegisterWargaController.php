<?php

namespace App\Http\Controllers\Api;

use App\Data_warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class ApiRegisterWargaController extends Controller
{
    public function store(ApiRegisterWargaRequest $request)
    {
        $data = $request->all();
        
        // Store the uploaded files
        if ($request->hasFile('foto_kk')) {
            $data['foto_kk'] = $request->file('foto_kk')->store('assets/foto_kk', 'public');
        }
        if ($request->hasFile('foto_ktp')) {
            $data['foto_ktp'] = $request->file('foto_ktp')->store('assets/foto_ktp', 'public');
        }
    
        // Calculate age category
        $tanggal = new DateTime($request->tanggal_lahir);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;
    
        if ($y >= 1 && $y <= 5) {
            $data['kategori_usia'] = 'Balita';
        } elseif ($y >= 5 && $y <= 11) {
            $data['kategori_usia'] = 'Anak-anak';
        } elseif ($y >= 12 && $y <= 25) {
            $data['kategori_usia'] = 'Remaja';
        } elseif ($y >= 26 && $y <= 45) {
            $data['kategori_usia'] = 'Dewasa';
        } elseif ($y >= 46 && $y <= 65) {
            $data['kategori_usia'] = 'Lansia';
        } elseif ($y >= 66 && $y <= 100) {
            $data['kategori_usia'] = 'Manula';
        }
    
        // Create the new warga data
        $warga = Data_warga::create($data);
    
        // Return JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Data Warga Berhasil Ditambahkan',
            'data' => $warga
        ]);
    }
}