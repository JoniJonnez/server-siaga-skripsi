<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePengaduanRequest extends FormRequest
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
            'lokasi_kejadian' => ['required', 'string'],
            'waktu_kejadian' => ['required', 'date'],
            'penyebab_kejadian' => ['required', 'string'],
            'judul_pengaduan' => ['required', 'string'],
            'isi_pengaduan' => ['required', 'string'],
            'foto_pengaduan' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
    public function messages()
    {
        return [
            'pengguna_id.required' => 'Pengguna tidak boleh kosong',
            'pengguna_id.integer' => 'Pengguna harus berupa angka',
            'pengguna_id.exists' => 'Pengguna tidak ditemukan',
            'lokasi_kejadian.required' => 'Lokasi kejadian tidak boleh kosong',
            'lokasi_kejadian.string' => 'Lokasi kejadian harus berupa string',
            'waktu_kejadian.required' => 'Waktu kejadian tidak boleh kosong',
            'waktu_kejadian.date' => 'Waktu kejadian harus berupa tanggal',
            'penyebab_kejadian.required' => 'Penyebab kejadian tidak boleh kosong',
            'penyebab_kejadian.string' => 'Penyebab kejadian harus berupa string',
            'judul_pengaduan.required' => 'Judul pengaduan tidak boleh kosong',
            'judul_pengaduan.string' => 'Judul pengaduan harus berupa string',
            'isi_pengaduan.required' => 'Isi pengaduan tidak boleh kosong',
            'isi_pengaduan.string' => 'Isi pengaduan harus berupa string',
            'foto_pengaduan.required' => 'Foto kejadian tidak boleh kosong',
            'foto_pengaduan.image' => 'Foto kejadian harus berupa gambar',
            'foto_pengaduan.mimes' => 'Foto kejadian harus berupa jpg, jpeg, atau png',
            'foto_pengaduan.max' => 'Foto kejadian maksimal 2MB',
        ];
    }
}
