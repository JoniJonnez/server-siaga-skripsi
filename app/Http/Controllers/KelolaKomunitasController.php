<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Rumah;
use App\Models\Informasi;
use App\Models\Komunitas;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\IuranPengguna;
use App\Models\SuratPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KelolaKomunitasController extends Controller
{
    //Halaman Kelola Komunitas
    public function index()
    {
        // dd("oke");
        $komunitas = Komunitas::get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.lainnya.kelola-komunitas.kelola-komunitas', compact(
            'komunitasKu',
            'memberKomunitas',
            'komunitas'
        ));
    }

    // menampikan halaman komunitas di sidebar
    public function show($id)
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $informasi = Informasi::query()->latest()->get();
        $suratPengajuan = SuratPengajuan::get();
        $surats = DB::table('surats')->get();
        $pengeluaran = Pengeluaran::get();
        $iuranPengguna = IuranPengguna::get();
        $iuranPenggunas = IuranPengguna::query()->latest()->get();
        $iuran = Iuran::query()->latest()->get();
        $rumah = Rumah::query()->latest()->get();
        $statusPengurus = Komunitas::where('user_id', Auth::user()->id)
            ->where("id", $id)->first();
        $getKomunitas = Komunitas::findOrFail($id);
        $komunitas = Komunitas::findOrFail($id);
        return view('dashboard.komunitasku.komunitas', compact(
            'komunitas',
            'getKomunitas',
            'statusPengurus',
            'rumah',
            'iuran',
            'iuranPenggunas',
            'iuranPengguna',
            'pengeluaran',
            'surats',
            'suratPengajuan',
            'informasi',
            'komunitasKu',
            'memberKomunitas',
        ));
    }

    //halaman edit data komunitas
    public function edit($id)
    {
        // dd("oke");
        $users = DB::table('users')->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::findOrFail($id);
        return view('dashboard.lainnya.kelola-komunitas.edit-kelolaKomunitas', compact(
            'komunitas',
            'komunitasKu',
            'memberKomunitas',
            'users',
        ));
    }

    // Proses Update pengguna
    public function update(Request $request, $id)
    {
        // dd('oke');
        // dd($request->all());
        $request->validate([
            'nama_komunitas' => 'required',
            'user_id' => 'required',
            'moto_komunitas' => 'required',
            'alamat_komunitas' => 'required',
            'deskripsi_komunitas' => 'required',
        ]);
        // dd($request);
        try {
            $komunitas = Komunitas::findOrFail($id);
            $komunitas->update([
                'nama_komunitas' => $request->nama_komunitas,
                'user_id' => $request->user_id,
                'moto_komunitas' => $request->moto_komunitas,
                'alamat_komunitas' => $request->alamat_komunitas,
                'deskripsi_komunitas' => $request->deskripsi_komunitas,
            ]);
            // return back()->with('success', 'Data pengguna berhasil diubah');
            return redirect()->route('kelolaKomunitas.index')->with('success', 'Data pengguna berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data pengguna gagal diubah');
            // return redirect()->route('kelola-pengguna.index')->with('error', 'Data pengguna gagal diubah');
        }
    }

    //Proses Hapus data komunitas
    public function destroy($id)
    {
        try {
            $komunitas = Komunitas::findOrFail($id);
            $komunitas->delete();
            return redirect()->back()->with('success', 'Komunitas berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Komunitas gagal dihapus');
        }
    }
}
