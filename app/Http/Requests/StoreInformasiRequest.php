<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInformasiRequest extends FormRequest
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
            'judul_informasi' => ['required', 'string'],
            'deskripsi_singkat' => ['required', 'string'],
            'isi_informasi' => ['required', 'string'],
            'file' => ['required', 'file'],
        ];
    }

    public function messages()
    {
        return [
            // 'pengguna_id.string' => 'Pengguna ID harus berupa string',
            'judul_informasi.required' => 'Judul informasi tidak boleh kosong',
            'judul_informasi.string' => 'Judul informasi harus berupa string',
            'deskripsi_singkat.required' => 'Deskripsi singkat tidak boleh kosong',
            'deskripsi_singkat.string' => 'Deskripsi singkat harus berupa string',
            'isi_informasi.required' => 'Isi informasi tidak boleh kosong',
            'isi_informasi.string' => 'Isi informasi harus berupa string',
            'file.required' => 'File tidak boleh kosong',
            'file.file' => 'File harus berupa file',
        ];
    }
}
