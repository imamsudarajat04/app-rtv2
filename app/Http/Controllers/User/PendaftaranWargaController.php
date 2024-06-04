<?php

namespace App\Http\Controllers\User;

use DateTime;
use App\Provinsi;
use App\Religions;
use App\Data_warga;
use App\GlobalSetting;
use App\FooterSettings;
use App\HeaderSettings;
use App\Http\Controllers\Controller;
use App\Http\Requests\PendaftaranWargaLandingPageRequest;

class PendaftaranWargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Provinsi::all();
        $religions = Religions::all();
        $headerSettings = HeaderSettings::first();
        $globalSettings = GlobalSetting::first();
        $footerSettings = FooterSettings::first();
        return view('pendaftaranwarga', [
            'headerSettings' => $headerSettings,
            'globalSettings' => $globalSettings,
            'footerSettings' => $footerSettings,
            'religions'      => $religions,
            'provinces'      => $provinces,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PendaftaranWargaLandingPageRequest $request)
    {
        $data = $request->all();
        $cek = Data_warga::where('nik', $data['nik'])->first();

        if($cek) {
            return redirect()->route('pendaftaran-warga.index')->with('error', 'Data Sudah Ada');
        }else{
            $data['foto_kk'] = $request->file('foto_kk')->store('datawarga/foto_kk', 'public');
            $data['foto_ktp'] = $request->file('foto_ktp')->store('datawarga/foto_ktp', 'public');

            $tanggal = new DateTime($request->tanggal_lahir);
            $today = new DateTime('today');
            $y = $today->diff($tanggal)->y;

            if($y >= 1 && $y <= 5) {
                $data['kategori_usia'] = 'Balita';
            }elseif($y >= 5 && $y <= 11){
                $data['kategori_usia'] = 'Anak-anak';
            }elseif($y >= 12 && $y <= 25){
                $data['kategori_usia'] = 'Remaja';
            }elseif($y >= 26 && $y <= 45){
                $data['kategori_usia'] = 'Dewasa';
            }elseif($y >= 46 && $y <= 65){
                $data['kategori_usia'] = 'Lansia';
            }elseif($y >= 66 && $y <= 100){
                $data['kategori_usia'] = 'Manula';
            }

            Data_warga::create($data);
            return redirect()->route('pendaftaran-warga.index')->with('success', 'Data Warga berhasil ditambahkan');
        }
    }
}
