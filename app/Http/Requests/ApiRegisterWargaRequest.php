<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiRegisterWargaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nik' => 'required|unique:data_warga,nik',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'foto_kk' => 'required|file|mimes:jpg,jpeg,png',
            'foto_ktp' => 'required|file|mimes:jpg,jpeg,png',
            // Add other necessary validation rules
        ];
    }
}