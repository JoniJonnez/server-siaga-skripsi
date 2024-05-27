<?php

namespace App\Http\Controllers;

use App\Models\Komunitas;
use App\Models\PengajuanKomunitas;
use App\Http\Requests\StorePengajuanKomunitasRequest;
use App\Http\Requests\UpdatePengajuanKomunitasRequest;

class PengajuanKomunitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.komunitas.gabung');
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
    public function store(StorePengajuanKomunitasRequest $request)
    {
        $validated = $request->validated();
        try {
            $validated['komunitas_id'] = request('komunitas');
            $validated['pengguna_id'] = auth()->user()->id;
            PengajuanKomunitas::create($validated);
            return to_route('carikomunitas.showkomunitas')->with('success', 'Data rumah berhasil ditambah.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data rumah gagal ditambah.');
        }

        return redirect()->back()->with('success', 'Data rumah berhasil ditambah.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengajuanKomunitas $pengajuanKomunitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengajuanKomunitasRequest $request, PengajuanKomunitas $pengajuanKomunitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengajuanKomunitas $pengajuanKomunitas)
    {
        //
    }
}
