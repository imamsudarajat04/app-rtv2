<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiStoreDataKematianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "no_akte_kematian" => ["required", "string"],
            "no_ktp" => ["required", "string", "digits:16"],
            "name" => ["required", "string"],
            "address" => ["required", "string"],
        ];
    }

    public function messages()
    {
        return [
            "no_akte_kematian.required" => "No Akte Kematian tidak boleh kosong",
            "no_ktp.required" => "No KTP tidak boleh kosong",
            "no_ktp.digits" => "No KTP harus 16 digit",
            "name.required" => "Nama tidak boleh kosong",
            "address.required" => "Alamat tidak boleh kosong",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'errors' => $validator->errors()
        ], 422));
    }
}
