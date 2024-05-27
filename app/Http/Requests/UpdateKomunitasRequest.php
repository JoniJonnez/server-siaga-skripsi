<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKomunitasRequest extends FormRequest
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
            'logo_komunitas' => 'image|mimes:jpg,jpeg,png|max:2048',
            'nama_komunitas' => 'string|max:255',
            'moto_komunitas' => 'string|max:255',
            'jumlah_warga' => 'numeric',
            'jumlah_rumah' => 'numeric',
            'no_tlp' => 'numeric|digits_between:10,13',
            'alamat_komunitas' => 'string|max:255',
            'warna_primer' => '',
            'warna_skunder' => '',

            'provinsi' => 'string|max:255',
            'kabupaten' => 'string|max:255',
            'kecamatan' => 'string|max:255',
            'desa' => 'string|max:255',
            'kode_pos' => 'numeric|digits:5',
        ];
    }
}
