<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePengaduanRequest extends FormRequest
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
            'tanggapan_pengaduan' => 'required|string|max:255'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'tanggapan_pengaduan.required' => 'Tanggapan pengaduan tidak boleh kosong.',
            'tanggapan_pengaduan.string' => 'Tanggapan pengaduan harus berupa string.',
            'tanggapan_pengaduan.max' => 'Tanggapan pengaduan maksimal 255 karakter.'
        ];
    }
}
