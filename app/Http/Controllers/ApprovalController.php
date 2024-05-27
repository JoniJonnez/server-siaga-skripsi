<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Models\Pengguna;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRumahRequest;
use App\Http\Requests\UpdateRumahRequest;
use App\Http\Requests\UpdateWargaRequest;
use App\Http\Requests\StorePengajuanKomunitasRequest;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $rumah = Rumah::query()->latest()->get();
        return view('dashboard.komunitas.approval-komunitas', compact('komunitasKu', 'memberKomunitas', 'getKomunitas', 'rumah'));
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $rumah = Rumah::findOrFail($id);
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        return view('dashboard.komunitas.show-pengajuan', compact(
            'komunitasKu',
            'memberKomunitas',
            'rumah',
            'getKomunitas'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    // // proses update status di bergabung ke komunitas
    // public function updateStatus()
    // {
    //     $ids = request('ids');
    //     $status = request('status_updatate');
    //     $rumah = Rumah::find($ids);
    //     $rumah->update([
    //         'status_komunitas' => $status
    //     ]);
    //     return back()->with('success', 'Pengguna berhasil di tambahkan ke komunitas');
    // }
    public function updateStatus()
    {
        $ids = request('ids');
        $status = request('status_updatate');
        $rumah = Rumah::find($ids);
        if (!$rumah) {
            return back()->with('error', 'Rumah tidak ditemukan.');
        }
        try {
            $rumah->update([
                'status_komunitas' => $status
            ]);
            if ($status === 'diterima') {
                return back()->with('success', 'Pengguna berhasil diterima bergabung ke komunitas.');
            } elseif ($status === 'menunggu') {
                return back()->with('success', 'Masih dalam proses bergabung ke komunitas.');
            } elseif ($status === 'ditolak') {
                return back()->with('success', 'Pengguna berhasil ditolak bergabung ke komunitas.');
            } else {
                return back()->with('success', 'Pengguna berhasil ditambahkan/ubah status di komunitas.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan saat mengupdate status.');
        }
    }
}
