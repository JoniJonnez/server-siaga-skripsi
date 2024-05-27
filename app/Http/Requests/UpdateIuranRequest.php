<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIuranRequest extends FormRequest
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
            'nama_iuran' => 'required',
            'jumlah' => 'required',
            'periode' => 'required',
            'status_iuran' => 'required',
            'pj_iuran' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'pemilik_rekening' => 'required',
            'nama_wallet' => 'required',
            'no_wallet' => 'required',
            'pemilik_ewallet' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_iuran.required' => 'Nama iuran tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'periode.required' => 'Periode tidak boleh kosong',
            'status_iuran.required' => 'Status iuran tidak boleh kosong',
            'pj_iuran.required' => 'PJ iuran tidak boleh kosong',
            'nama_bank.required' => 'Nama bank tidak boleh kosong',
            'no_rekening.required' => 'No rekening tidak boleh kosong',
            'pemilik_rekening.required' => 'Pemilik rekening tidak boleh kosong',
            'nama_wallet.required' => 'Nama wallet tidak boleh kosong',
            'no_wallet.required' => 'No wallet tidak boleh kosong',
            'pemilik_ewallet.required' => 'Pemilik ewallet tidak boleh kosong',
        ];
    }
}
