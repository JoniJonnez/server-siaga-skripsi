<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIuranRequest extends FormRequest
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
            'nama_iuran' => ['string'],
            'jumlah' => ['numeric'],
            'periode' => ['string'],
            'status_iuran' => ['string'],
            'status_pembayaran' => ['string'], // 'lunas', 'belum lunas', 'menunggu konfirmasi
            'pj_iuran' => ['string'],
            'nama_bank' => ['string'],
            'no_rekening' => ['string'],
            'nama_wallet' => ['string'],
            'no_wallet' => ['string'],
        ];
    }
    public function messages()
    {
        return [
            'nama_iuran.string' => 'Nama iuran harus berupa string',
            'jumlah.numeric' => 'Jumlah iuran harus berupa angka',
            'periode.string' => 'Periode iuran harus berupa string',
            'status_iuran.string' => 'Status iuran harus berupa string',
            'status_pembayaran.string' => 'Status iuran harus berupa string',
            'pj_iuran.string' => 'Penanggung jawab iuran harus berupa string',
            'nama_bank.string' => 'Nama bank harus berupa string',
            'no_rekening.string' => 'Nomor rekening harus berupa string',
            'nama_wallet.string' => 'Nama wallet harus berupa string',
            'no_wallet.string' => 'Nomor wallet harus berupa string',
        ];
    }
}
