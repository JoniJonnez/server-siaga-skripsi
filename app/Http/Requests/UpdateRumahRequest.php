<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRumahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'rt' => '',
            'rw' => '',
            'jalan' => '',
            'blok' => '',
            'kode_rumah' => 'required',
            'pengguna_id' => 'required',
            'status_hunian' => 'required',
            'jabatan' => 'required',
        ];
    }
}
