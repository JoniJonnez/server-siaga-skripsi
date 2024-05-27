<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRumahRequest extends FormRequest
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
            'rt' => ['string'],
            'rw' => ['string'],
            'jalan' => ['string'],
            'blok' => ['string'],
            'kode_rumah' => ['string'],
            'komunitas_id' => [''],
            'pengguna_id' => [''],
        ];
    }

    public function messages()
    {
        return [
            'rt.string' => 'RT harus berupa string',
            'rw.string' => 'RW harus berupa string',
            'jalan.string' => 'Jalan harus berupa string',
            'blok.string' => 'Blok harus berupa string',
            'kode_rumah.string' => 'Kode rumah harus berupa string',
        ];
    }
}
