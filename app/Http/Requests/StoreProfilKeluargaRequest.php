<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfilKeluargaRequest extends FormRequest
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
            'pengguna_id' => [''],
            'nama_anggota_keluarga' => ['string'],
            'hubungan_keluarga' => ['string'],
            'jenis_kelamin' => ['string'],
            'tanggal_lahir' => ['date'],
            'agama' => ['string'],
            'pekerjaan' => ['string'],
            'phone' => ['string'],
            'email' => ['string'],
        ];
    }
    public function messages()
    {
        return [
            'nama_anggota_keluarga.string' => 'Nama anggota keluarga harus berupa string',
            'hubungan_keluarga.string' => 'Hubungan keluarga harus berupa string',
            'jenis_kelamin.string' => 'Jenis kelamin harus berupa string',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa date',
            'agama.string' => 'Agama harus berupa string',
            'pekerjaan.string' => 'Pekerjaan harus berupa string',
            'phone.string' => 'Nomor telepon harus berupa string',
            'email.string' => 'Email harus berupa string',
        ];
    }
}
