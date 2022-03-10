<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class DataRTRequest extends FormRequest
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
                'nik'         => 'string|max:16',
                'name'        => 'required|string',
                'rw'          => 'required|string',
                'rt'          => 'required|string',
                'address'     => 'required|string',
                'phone'       => 'required|numeric',
                'village'     => 'required|string',
                'districts'   => 'required|string',
            ];
        } else {
            $rules = [
                'nik'         => 'required|string|max:16',
                'name'        => 'required|string',
                'rw'          => 'required|string',
                'rt'          => 'required|string',
                'address'     => 'required|string',
                'phone'       => 'required|numeric',
                'village'     => 'required|string',
                'districts'   => 'required|string',
            ];
        }

        return $rules;
    }
}
