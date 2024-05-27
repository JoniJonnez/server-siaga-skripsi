<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Http\Request;
use App\Models\PengaturanKomunitas;
use App\Http\Requests\StorePengaturanKomunitasRequest;
use App\Http\Requests\UpdatePengaturanKomunitasRequest;

class PengaturanKomunitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $pengaturanKomunitas = PengaturanKomunitas::all();
        $data = $pengaturanKomunitas->pluck('aksi', 'pertanyaan')->all();
        return view('dashboard.komunitasku.komunitas_pengaturan.pengaturan-admin', compact('data', 'komunitas', 'getKomunitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pertanyaan = $request->input('pengaturan');
        $kom = $request->input('komunitas');
        // Simpan semua pertanyaan
        foreach ($pertanyaan as $item) {
            PengaturanKomunitas::updateOrCreate(
                [
                    'pengguna_id' => 1,
                    'komunitas_id' => $kom, // '1' adalah id komunitas 'Komunitas Admin
                    'pertanyaan' => $item['pengaturan'],
                ],
                [
                    'aksi' => $item['jawaban'],
                ]
            );
        }
        // Berikan respons atau lakukan tindakan lainnya setelah penyimpanan

        return response()->json(['message' => 'Pengaturan berhasil disimpan'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(PengaturanKomunitas $pengaturanKomunitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengaturanKomunitas $pengaturanKomunitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengaturanKomunitasRequest $request, PengaturanKomunitas $pengaturanKomunitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengaturanKomunitas $pengaturanKomunitas)
    {
        //
    }
}
