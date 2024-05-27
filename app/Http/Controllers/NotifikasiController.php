<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Komunitas;
use App\Models\Pengaduan;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreNotifikasiRequest;
use App\Http\Requests\UpdateNotifikasiRequest;
use App\Models\Informasi;

class NotifikasiController extends Controller
{
    //halaman notifikasi
    // public function index()
    // {
    //     $informasi = Informasi::get();
    //     $pengaduan = Pengaduan::get();
    //     $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
    //         ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
    //         ->where('rumahs.user_id', Auth::user()->id)
    //         ->where('status_komunitas', 'diterima')->get();
    //     $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
    //     $komunitas = Komunitas::get();

    //     // Check if user has a rumah
    //     $hasRumah = Rumah::where('user_id', Auth::user()->id)->exists();

    //     return view('dashboard.notifikasi.index', compact('komunitasKu', 'komunitas', 'memberKomunitas', 'pengaduan', 'informasi', 'hasRumah'));
    // }
    public function index()
    {
        $user = Auth::user();
        $komunitasIdRumahUser = Rumah::where('user_id', $user->id)->pluck('komunitas_id')->toArray();

        $informasi = Informasi::whereIn('komunitas_id', $komunitasIdRumahUser)->get();
        $pengaduan = Pengaduan::whereIn('komunitas_id', $komunitasIdRumahUser)->get();

        $memberKomunitas = Komunitas::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("rumahs", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', $user->id)
            ->where('status_komunitas', 'diterima')->get();

        $komunitasKu = Komunitas::where('user_id', $user->id)->get();
        $komunitas = Komunitas::get();

        // Check if user has a rumah
        $hasRumah = Rumah::where('user_id', $user->id)->exists();

        return view('dashboard.notifikasi.index', compact('komunitasKu', 'komunitas', 'memberKomunitas', 'pengaduan', 'informasi', 'hasRumah'));
    }
    // public function index()
    // {
    //     $informasi = Informasi::get();
    //     $pengaduan = Pengaduan::get();
    //     $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
    //         ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
    //         ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
    //     $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
    //     $komunitas = Komunitas::get();
    //     return view('dashboard.notifikasi.index', compact('komunitasKu', 'komunitas', 'memberKomunitas', 'pengaduan', 'informasi'));
    // }

    // proses muncul modals
    public function getNotifikasi($id)
    {
        // Cari notifikasi berdasarkan ID
        $data = null;
        $pengaduan = Pengaduan::find($id);
        $informasi = Informasi::find($id);

        if ($pengaduan) {
            $data = [
                'judul' => 'Pengaduan: ' . $pengaduan->judul_pengaduan,
                'isi' => $pengaduan->isi_pengaduan,
                'lokasi' => $pengaduan->lokasi_kejadian, // Ganti dengan data yang sesuai
                'waktu' => $pengaduan->waktu_kejadian, // Ganti dengan data yang sesuai
                'pengirim' => $pengaduan->user->name,
                'penyebab' => $pengaduan->penyebab_kejadian, // Ganti dengan data yang sesuai
                'foto' => asset('image/jalan_berlubang.jpg') // Ganti dengan URL foto yang sesuai
            ];
        } elseif ($informasi) {
            $data = [
                'judul' => 'Informasi: ' . $informasi->judul_informasi,
                'isi' => $informasi->deskripsi_singkat,
                'lokasi' => 'Jalan Merak', // Ganti dengan data yang sesuai
                'waktu' => 'Pukul 15.00', // Ganti dengan data yang sesuai
                'pengirim' => 'Sukijan', // Ganti dengan data yang sesuai
                'penyebab' => 'Dilalui kendaraan berat', // Ganti dengan data yang sesuai
                'foto' => asset('image/jalan_berlubang.jpg') // Ganti dengan URL foto yang sesuai
            ];
        }

        return response()->json($data);
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
    public function store(StoreNotifikasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotifikasiRequest $request, Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notifikasi $notifikasi)
    {
        //
    }
}
