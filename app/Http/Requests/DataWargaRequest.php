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
                'bantuan_pemerintah'        => 'required|numeric',
                'disabilitas'               => 'required|numeric',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'no_kk.required'                => 'No KK tidak boleh kosong',
            'no_kk.numeric'                 => 'No KK harus berupa angka',
            'no_kk.digits_between'          => 'No KK harus terdiri dari 16 digit',
            'nik.required'                  => 'NIK tidak boleh kosong',
            'nik.numeric'                   => 'NIK harus berupa angka',
            'nik.digits_between'            => 'NIK harus terdiri dari 16 digit',
            'nama_lengkap.required'         => 'Nama lengkap tidak boleh kosong',
            'nama_lengkap.regex'            => 'Nama lengkap hanya boleh berisi huruf dan spasi',
            'tempat_lahir.required'         => 'Tempat lahir tidak boleh kosong',
            'tanggal_lahir.required'        => 'Tanggal lahir tidak boleh kosong',
            'tanggal_lahir.before'          => 'Tanggal lahir tidak boleh lebih dari tanggal sekarang',
            'jenis_kelamin.required'        => 'Jenis kelamin tidak boleh kosong',
            'religions_id.required'         => 'Agama tidak boleh kosong',
            'religions_id.numeric'          => 'Agama harus berupa angka',
            'provinsi.required'             => 'Provinsi tidak boleh kosong',
            'provinsi.numeric'              => 'Provinsi harus berupa angka',
            'kabupaten.required'            => 'Kabupaten tidak boleh kosong',
            'kabupaten.numeric'             => 'Kabupaten harus berupa angka',
            'kecamatan.required'            => 'Kecamatan tidak boleh kosong',
            'kecamatan.numeric'             => 'Kecamatan harus berupa angka',
            'kelurahan.required'            => 'Kelurahan tidak boleh kosong',
            'kelurahan.numeric'             => 'Kelurahan harus berupa angka',
            'kode_pos.required'             => 'Kode pos tidak boleh kosong',
            'kode_pos.numeric'              => 'Kode pos harus berupa angka',
            'alamat.required'               => 'Alamat tidak boleh kosong',
            'rt.required'                   => 'RT tidak boleh kosong',
            'rt.numeric'                    => 'RT harus berupa angka',
            'rw.required'                   => 'RW tidak boleh kosong',
            'rw.numeric'                    => 'RW harus berupa angka',
            'pendidikan.required'           => 'Pendidikan tidak boleh kosong',
            'jenis_pekerjaan.required'      => 'Jenis pekerjaan tidak boleh kosong',
            'status_perkawinan.required'    => 'Status perkawinan tidak boleh kosong',
            'status_perkawinan.numeric'     => 'Status perkawinan harus berupa angka',
            'status_dalam_keluarga.required'=> 'Status dalam keluarga tidak boleh kosong',
            'status_dalam_keluarga.numeric' => 'Status dalam keluarga harus berupa angka',
            'kewarganegaraan.required'      => 'Kewarganegaraan tidak boleh kosong',
            'foto_kk.required'              => 'Foto KK tidak boleh kosong',
            'foto_kk.file'                  => 'Foto KK harus berupa file',
            'foto_kk.mimes'                 => 'Foto KK harus berupa file dengan format png, jpg, jpeg',
            'no_paspor.digits_between'      => 'No paspor harus terdiri dari 0-7 digit',
            'no_kitas_kitap.digits_between' => 'No kitas kitap harus terdiri dari 0-12 digit',
            'foto_paspor.file'              => 'Foto paspor harus berupa file',
            'foto_paspor.mimes'             => 'Foto paspor harus berupa file dengan format png, jpg, jpeg',
            'nama_ayah.required'            => 'Nama ayah tidak boleh kosong',
            'nama_ayah.regex'               => 'Nama ayah hanya boleh berisi huruf dan spasi',
            'pekerjaan_ayah.required'       => 'Pekerjaan ayah tidak boleh kosong',
            'nama_ibu.required'             => 'Nama ibu tidak boleh kosong',
            'nama_ibu.regex'                => 'Nama ibu hanya boleh berisi huruf dan spasi',
            'pekerjaan_ibu.required'        => 'Pekerjaan ibu tidak boleh kosong',
            'bantuan_pemerintah.required'   => 'Bantuan pemerintah tidak boleh kosong',
            'bantuan_pemerintah.numeric'    => 'Bantuan pemerintah harus berupa angka',
            'disabilitas.required'          => 'Disabilitas tidak boleh kosong',
            'disabilitas.numeric'           => 'Disabilitas harus berupa angka!',
        ];
    }
}
