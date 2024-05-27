<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use App\Models\ProfilKeluarga;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProfilKeluargaRequest;
use App\Http\Requests\UpdateProfilKeluargaRequest;

class ProfilKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        // $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $profilKeluarga = ProfilKeluarga::latest()->get();
        return view('dashboard.profil_keluarga.profil-k', compact('profilKeluarga', 'komunitas', 'komunitasKu', 'memberKomunitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $komunnitas = Komunitas::latest()->get();
        return view('dashboard.profil_keluarga.tambah-keluarga', compact('komunnitas', 'komunitas', 'komunitasKu', 'memberKomunitas'));
    }

    /**
     *  tambah data keluarga
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request['user_id'] = Auth::user()->id;
        $request->validate([
            'user_id' => '',
            'nama_anggota_keluarga' => 'required',
            'hubungan_keluarga' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        try {
            ProfilKeluarga::create($request->all());
            return to_route('profil-keluarga.index')->with('success', 'Data anggota keluarga berhasil ditambah.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data anggota keluarga gagal ditambah.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilKeluarga $profilKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilKeluarga $profilKeluarga)
    {
        //
    }

    /**
     * Proses update data keluarga
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_anggota_keluarga' => 'required',
            'hubungan_keluarga' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        try {
            $profilKeluarga = ProfilKeluarga::findOrFail($id);
            $profilKeluarga->update($request->all());
            return redirect()->route('profil-keluarga.index')->with('success', 'Data anggota keluarga berhasil diperbarui.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data anggota keluarga gagal diperbarui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $profilKeluarga = ProfilKeluarga::findOrFail($id);
            $profilKeluarga->delete();
            return redirect()->route('profil-keluarga.index')->with('success', 'Data anggota keluarga berhasil dihapus.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data anggota keluarga gagal dihapus.');
        }
    }
}
