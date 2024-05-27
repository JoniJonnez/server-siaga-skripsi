<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rumah;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelolaPenggunaController extends Controller
{
    // Halaman Kelola Pengguna
    public function index()
    {
        // dd("oke");
        $user = User::get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.lainnya.kelola-pengguna.kelola-pengguna', compact(
            'komunitasKu',
            'memberKomunitas',
            'user'
        ));
    }

    // Halaman edit pengguna
    public function edit($id)
    {
        // dd("oke");
        $user = User::findOrFail($id);
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.lainnya.kelola-pengguna.edit-pengguna', compact(
            'komunitasKu',
            'memberKomunitas',
            'user'
        ));
    }

    // Proses Update pengguna
    public function update(Request $request, $id)
    {
        // dd('oke');
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
        ]);
        // dd($request);
        try {
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'status' => $request->status,
                'email' => $request->email,
                'phone' => $request->phone,
                'nik' => $request->nik,
                'alamat' => $request->alamat,
            ]);
            // return back()->with('success', 'Data pengguna berhasil diubah');
            return redirect()->route('kelolaPengguna.index')->with('success', 'Data pengguna berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data pengguna gagal diubah');
            // return redirect()->route('kelola-pengguna.index')->with('error', 'Data pengguna gagal diubah');
        }
    }

    public function show()
    {
        // dd('oke');
    }

    // Proses Hapus pengguna
    public function destroy($id)
    {
        // dd($id);
        try {
            $user = User::where('id', $id)->first();
            $user->delete();
            return back()->with('success', ' Pengguna berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Pengguna gagal dihapus');
        }
    }
}
