<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
        return [
            'password'         => 'required|same:confirm_password|different:old_password',
            'confirm_password' => 'required',
            'old_password'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'password.required'         => 'Password Baru Wajib Diisi',
            'password.same'             => 'Password Konfirmasi Tidak Sama',
            'password.different'        => 'Password Baru Dan Lama Tidak Boleh Sama',
            'confirm_password.required' => 'Password Konfirmasi Wajib Diisi',
            'old_password.required'     => 'Password Lama Wajib Diisi',
        ];
    }
}
