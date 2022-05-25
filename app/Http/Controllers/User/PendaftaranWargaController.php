<?php

namespace App\Http\Controllers\User;

use DateTime;
use App\Provinsi;
use App\Religions;
use App\Data_warga;
use App\GlobalSetting;
use App\FooterSettings;
use App\HeaderSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataWargaRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if($y >= 5 && $y <= 11){
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
        return Redirect::back()->with('success', "Data berhasil ditambahkan");
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
}
