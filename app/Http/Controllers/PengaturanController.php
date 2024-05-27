<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Models\Komunitas;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePengaturanRequest;
use App\Http\Requests\UpdatePengaturanRequest;

class PengaturanController extends Controller
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
        return view('dashboard.pengaturan.pengaturan', compact('komunitasKu', 'komunitas', 'memberKomunitas'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
    }

    //Store a newly created resource in storage.
    public function store(StorePengaturanRequest $request)
    {
        //
    }

    //Display the specified resource.
    public function show(Pengaturan $pengaturan)
    {
        //
    }

    //Show the form for editing the specified resource.
    public function edit(Pengaturan $pengaturan)
    {
        //
    }

    //saya coba buat fungsi updateAkun
    public function updateAkun(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        return redirect()->route('pengaturan.pengaturan')->with('success', 'Data informasi akun berhasil diperbarui.');
    }

    //Remove the specified resource from storage.
    public function destroy(Pengaturan $pengaturan)
    {
        //
    }
}
