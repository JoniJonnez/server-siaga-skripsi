<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengajuanKomunitasRequest extends FormRequest
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
            'komunitas_id' => [''],
            'jalan' => ['string'],
            'rt' => ['string'],
            'rw' => ['string'],
            'blok' => ['string'],
            'kode_rumah' => ['string'],
            'status_hunian' => ['string'],
            'bulan_huni' => ['string'],
            'tahun_huni' => ['string'],
        ];
    }
    public function messages()
    {
        return [
            'jalan.string' => 'Jalan harus berupa string',
            'rt.string' => 'RT harus berupa string',
            'rw.string' => 'RW harus berupa string',
            'blok.string' => 'Blok harus berupa string',
            'kode_rumah.string' => 'Kode rumah harus berupa string',
            'status_hunian.string' => 'Status hunian harus berupa string',
            'bulan_huni.string' => 'Bulan huni harus berupa string',
            'tahun_huni.string' => 'Tahun huni harus berupa string',
        ];
    }
}
