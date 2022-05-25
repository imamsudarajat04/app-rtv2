<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DataWargaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules = [
                'nik'                       => 'required|numeric|digits_between:16,16',
                'nama_lengkap'              => 'required|regex:/^[\pL\s\-]+$/u',
                'tempat_lahir'              => 'required',
                'tanggal_lahir'             => 'required|before:today',
                'jenis_kelamin'             => 'required',
                'religions_id'              => 'required|numeric',
                'provinsi'                  => 'required|numeric',
                'kabupaten'                 => 'required|numeric',
                'kecamatan'                 => 'required|numeric',
                'kelurahan'                 => 'required|numeric',
                'kode_pos'                  => 'required|numeric',
                'alamat'                    => 'required',
                'rt'                        => 'required|numeric',
                'rw'                        => 'required|numeric',
                'pendidikan'                => 'required',
                'jenis_pekerjaan'           => 'required',
                'status_perkawinan'         => 'required|numeric',
                'status_dalam_keluarga'     => 'required|numeric',
                'kewarganegaraan'           => 'required',
                'foto_kk'                   => 'file|mimes:png,jpg,jpeg',
                'no_paspor'                 => 'digits_between:0,7',
                'no_kitas_kitap'            => 'digits_between:0,12',
                'foto_paspor'               => 'file|mimes:png,jpg,jpeg',
                'nama_ayah'                 => 'required|regex:/^[\pL\s\-]+$/u',
                'pekerjaan_ayah'            => 'required',
                'nama_ibu'                  => 'required|regex:/^[\pL\s\-]+$/u',
                'pekerjaan_ibu'             => 'required',
                'warga_pindahan'            => 'required|numeric',
                'bantuan_pemerintah'        => 'required|numeric',
                'disabilitas'               => 'required|numeric',  
            ];
        } else {
            $rules = [
                'no_kk'                     => 'required|numeric|digits_between:16,16',
                'nik'                       => 'required|numeric|digits_between:16,16',
                'nama_lengkap'              => 'required|regex:/^[\pL\s\-]+$/u',
                'tempat_lahir'              => 'required',
                'tanggal_lahir'             => 'required|before:today',
                'jenis_kelamin'             => 'required',
                'religions_id'              => 'required|numeric',
                'provinsi'                  => 'required|numeric',
                'kabupaten'                 => 'required|numeric',
                'kecamatan'                 => 'required|numeric',
                'kelurahan'                 => 'required|numeric',
                'kode_pos'                  => 'required|numeric',
                'alamat'                    => 'required',
                'rt'                        => 'required|numeric',
                'rw'                        => 'required|numeric',
                'pendidikan'                => 'required',
                'jenis_pekerjaan'           => 'required',
                'status_perkawinan'         => 'required|numeric',
                'status_dalam_keluarga'     => 'required|numeric',
                'kewarganegaraan'           => 'required',
                'foto_kk'                   => 'required|file|mimes:png,jpg,jpeg',
                'no_paspor'                 => 'digits_between:0,7',
                'no_kitas_kitap'            => 'digits_between:0,12',
                'foto_paspor'               => 'file|mimes:png,jpg,jpeg',
                'nama_ayah'                 => 'required|regex:/^[\pL\s\-]+$/u',
                'pekerjaan_ayah'            => 'required',
                'nama_ibu'                  => 'required|regex:/^[\pL\s\-]+$/u',
                'pekerjaan_ibu'             => 'required',
                'warga_pindahan'            => 'required|numeric',
                'bantuan_pemerintah'        => 'required|numeric',
                'disabilitas'               => 'required|numeric',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'no_kk.required'                => 'No KK Tidak Boleh Kosong',
            'no_kk.numeric'                 => 'No KK Harus Berupa Angka',
            'no_kk.digits_between'          => 'No KK Harus Terdiri Dari 16 digit',
            'nik.required'                  => 'NIK Tidak Boleh Kosong',
            'nik.numeric'                   => 'NIK Harus Berupa Angka',
            'nik.digits_between'            => 'NIK Harus Terdiri Dari 16 digit',
            'nama_lengkap.required'         => 'Nama Lengkap Tidak Boleh Kosong',
            'nama_lengkap.regex'            => 'Nama Lengkap Hanya Boleh Berisi Huruf Dan Spasi',
            'tempat_lahir.required'         => 'Tempat Lahir Tidak Boleh Kosong',
            'tanggal_lahir.required'        => 'Tanggal Lahir Tidak Boleh Kosong',
            'tanggal_lahir.before'          => 'Tanggal Lahir Tidak Boleh Lebih Dari Tanggal Sekarang',
            'jenis_kelamin.required'        => 'Jenis Kelamin Tidak Boleh Kosong',
            'religions_id.required'         => 'Agama Tidak Boleh Kosong',
            'religions_id.numeric'          => 'Agama Harus Berupa Angka',
            'provinsi.required'             => 'Provinsi Tidak Boleh Kosong',
            'provinsi.numeric'              => 'Provinsi Harus Berupa Angka',
            'kabupaten.required'            => 'Kabupaten Tidak Boleh Kosong',
            'kabupaten.numeric'             => 'Kabupaten Harus Berupa Angka',
            'kecamatan.required'            => 'Kecamatan Tidak Boleh Kosong',
            'kecamatan.numeric'             => 'Kecamatan Harus Berupa Angka',
            'kelurahan.required'            => 'Kelurahan Tidak Boleh Kosong',
            'kelurahan.numeric'             => 'Kelurahan Harus Berupa Angka',
            'kode_pos.required'             => 'Kode Pos Tidak Boleh Kosong',
            'kode_pos.numeric'              => 'Kode Pos Harus Berupa Angka',
            'alamat.required'               => 'Alamat Tidak Boleh Kosong',
            'rt.required'                   => 'RT Tidak Boleh Kosong',
            'rt.numeric'                    => 'RT Harus Berupa Angka',
            'rw.required'                   => 'RW Tidak Boleh Kosong',
            'rw.numeric'                    => 'RW Harus Berupa Angka',
            'pendidikan.required'           => 'Pendidikan Tidak Boleh Kosong',
            'jenis_pekerjaan.required'      => 'Jenis Pekerjaan Tidak Boleh Kosong',
            'status_perkawinan.required'    => 'Status Perkawinan Tidak Boleh Kosong',
            'status_dalam_keluarga.required'=> 'Status Dalam Keluarga Tidak Boleh Kosong',
            'kewarganegaraan.required'      => 'Kewarganegaraan Tidak Boleh Kosong',
            'foto_kk.required'              => 'Foto KK Tidak Boleh Kosong',
            'foto_kk.file'                  => 'Foto KK Harus Berupa File',
            'foto_kk.mimes'                 => 'Foto KK Harus Berupa File Dengan Format png, jpg, jpeg',
            'no_paspor.digits_between'      => 'No Paspor Harus Terdiri Dari 0-7 digit',
            'no_kitas_kitap.digits_between' => 'No Kitas Kitap Harus Terdiri Dari 0-12 digit',
            'foto_paspor.file'              => 'Foto Paspor Harus Berupa File',
            'foto_paspor.mimes'             => 'Foto Paspor Harus Berupa File Dengan Format png, jpg, jpeg',
            'nama_ayah.required'            => 'Nama Ayah Tidak Boleh Kosong',
            'nama_ayah.regex'               => 'Nama Ayah Hanya Boleh Berisi Huruf Dan Spasi',
            'pekerjaan_ayah.required'       => 'Pekerjaan Ayah Tidak Boleh Kosong',
            'nama_ibu.required'             => 'Nama Ibu Tidak Boleh Kosong',
            'nama_ibu.regex'                => 'Nama Ibu Hanya Boleh Berisi Huruf Dan Spasi',
            'pekerjaan_ibu.required'        => 'Pekerjaan Ibu Tidak Boleh Kosong',
            'warga_pindahan.required'       => 'Warga Pindahan Tidak Boleh Kosong',
            'bantuan_pemerintah.required'   => 'Bantuan Pemerintah Tidak Boleh Kosong',
            'disabilitas.required'          => 'Disabilitas Tidak Boleh Kosong',
        ];
    }
}
