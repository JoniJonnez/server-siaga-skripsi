<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKomunitasRequest extends FormRequest
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
            'user_id' => [''],
            'nama_komunitas' => ['string'],
            'moto_komunitas' => ['string'],
            'alamat_komunitas' => ['string'],
            'provinsi' => ['string'],
            'kecamatan' => ['string'],
            'kode_pos' => ['string'],
            'kabupaten' => ['string'],
            'desa' => ['string'],
            'logo_komunitas' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'warna_primer' => ['string'],
            'warna_skunder' => ['string'],
        ];
    }
    public function messages()
    {
        return [
            'nama_komunitas.string' => 'Nama komunitas harus berupa string',
            'moto_komunitas.string' => 'Moto komunitas harus berupa string',
            'alamat_komunitas.string' => 'Alamat komunitas harus berupa string',
            'provinsi.string' => 'Provinsi harus berupa string',
            'kecamatan.string' => 'Kecamatan harus berupa string',
            'kode_pos.string' => 'Kode pos harus berupa string',
            'kabupaten.string' => 'Kabupaten harus berupa string',
            'desa.string' => 'Desa harus berupa string',
            'logo_komunitas.image' => 'Foto komunitas harus berupa gambar',
            'logo_komunitas.mimes' => 'Foto komunitas harus berupa jpg, jpeg, atau png',
            'logo_komunitas.max' => 'Foto komunitas maksimal 2MB',
        ];
    }
}
