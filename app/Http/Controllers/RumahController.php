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

class RumahController extends Controller
{
    // Halaman Rumah
    public function index()
    {
        $rumah = Rumah::get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        return view('dashboard.komunitasku.komunitas_rumah.rumah-admin', compact('komunitasKu', 'komunitas', 'rumah', 'getKomunitas', 'memberKomunitas'));
    }

    //halaman warga
    public function indexWarga()
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $rumah = Rumah::query()->latest()->get();
        return view('dashboard.komunitasku.komunitas_warga.warga-admin', compact('komunitasKu', 'komunitas', 'rumah', 'getKomunitas', 'memberKomunitas'));
    }

    /**
     * halaman edit warga
     */
    public function edit($id) // Change the parameter name to $id
    {
        // dd("oke");
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        // Fetch all users for the dropdown
        $users = User::all();
        // Find the specific Rumah record
        $rumah = Rumah::findOrFail($id);
        return view('dashboard.komunitasku.komunitas_warga.edit-warga', compact('rumah', 'users', 'komunitasKu', 'memberKomunitas', 'getKomunitas'));
    }

    //proses pengajuan bergabung ke komunitas
    public function storePengajuan(Request $request)
    {
        // dd('ok');
        $request['user_id'] = Auth::user()->id;

        $message = [
            'jalan.required' => 'Jalan tidak boleh kosong',
            'rt.required' => 'RT tidak boleh kosong',
            'rw.required' => 'RW tidak boleh kosong',
            'blok.required' => 'Blok tidak boleh kosong',
            'kode_rumah.required' => 'Kode rumah tidak boleh kosong',
            'status_hunian.required' => 'Status hunian tidak boleh kosong',
            'bulan_huni.required' => 'Bulan huni tidak boleh kosong',
            'tahun_huni.required' => 'Tahun huni tidak boleh kosong',
            'foto.required' => 'Foto tidak boleh kosong',
        ];
        $request->validate([
            'user_id' => '',
            'komunitas_id' => '',
            'jalan' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'blok' => 'required',
            'kode_rumah' => 'required',
            'status_hunian' => 'required',
            'bulan_huni' => 'required',
            'tahun_huni' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $message);
        // dd($request);
        try {
            $validated = $request->except('_token');
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $validated['foto'] = $file->store('pengajuan_image', 'public');
            }
            // dd($validated);
            // Rumah::create($request->all());
            Rumah::create($validated);
            return to_route('cariKomunitas.cari')->with('success', 'Data rumah berhasil diajukan ke komunitas');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data rumah gagal diajukan ke komunitas.');
        }
        return redirect()->back()->with('success', 'Data rumah berhasil diajukan ke komunitas.');
    }

    // tambah data rumah
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'user_id' => '',
            'komunitas_id' => '',
            'rt' => 'required',
            'rw' => 'required',
            'jalan' => 'required',
            'blok' => 'required',
            'kode_rumah' => 'required',
            'status_komunitas' => ''
        ]);
        // dd($request);
        try {
            $validatedData = $request->except('_token');
            // $validatedData['user_id'] = Auth::user()->id;
            $validatedData['status_komunitas'] = 'diterima';
            Rumah::create($validatedData);
            return redirect()->back()->with('success', 'Data rumah berhasil ditambah.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data rumah gagal ditambah.');
        }
        return redirect()->back()->with('success', 'Data rumah berhasil ditambah.');
    }

    //halaman persetujuan bergabung ke komunitas
    // public function approval()
    // {
    //     $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
    //     $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
    //         ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
    //         ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
    //     $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
    //     $rumah = Rumah::query()->latest()->get();
    //     return view('dashboard.komunitas.approval-komunitas', compact('komunitasKu', 'memberKomunitas', 'getKomunitas', 'rumah'));
    // }

    //proses persetujuan bergabung ke kommunitas
    public function setuju($id)
    {
        $rumah = Rumah::findOrFail($id);

        // Lakukan proses persetujuan
        $rumah->status_komunitas = 'diterima';
        $rumah->save();

        // Tambahkan log atau notifikasi jika diperlukan

        return redirect()->back()->with('success', 'Pengguna berhasil di tambahkan ke komunitas');
    }

    //proses penolakan bergabung ke kommunitas
    public function tolak($id)
    {
        $rumah = Rumah::findOrFail($id);
        // Lakukan proses penolakan
        $rumah->status_komunitas = 'ditolak';
        $rumah->save();
        // Tambahkan log atau notifikasi jika diperlukan
        return redirect()->back()->with('success', 'Pengguna di tolak bergabung ke komunitas');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rumah $rumah)
    {
        //
    }



    // halaman update/edit data warga
    public function updateWarga(Request $request, $id)
    {
        $request->validate([
            'kode_rumah' => 'required',
            'user_id' => 'required',
            'status_hunian' => 'required',
            'status' => 'required'
        ]);
        // dd($request->all());
        try {
            $rumah = Rumah::findOrFail($id);
            $rumah->update($request->only(['kode_rumah', 'user_id', 'status_hunian']));
            $user = User::where("id", $rumah->user_id)->update([
                "status" => $request->status
            ]);
            // return back()->with('success', 'Data warga berhasil diperbaharui');
            return redirect()->route('wargaKomunitas.indexWarga', ['komunitas_id' => $rumah->komunitas_id])->with('success', 'Data warga berhasil diperbaharui');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data warga gagal diperbaharui');
        }
    }

    //proses edit/update data halaman rumah
    public function updateRumah(Request $request, $id)
    {
        $request->validate([
            'rt' => 'required',
            'rw' => 'required',
            'jalan' => 'required',
            'blok' => 'required',
            'kode_rumah' => 'required'
        ]);
        try {
            $rumah = Rumah::findOrFail($id);
            $rumah->update($request->all());
            return redirect()->back()->with('success', 'Data rumah berhasil perbaharui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data rumah gagal diperbaharui');
        }
    }


    /**
     * hapus data rumah
     */
    public function destroy($id)
    {
        // dd("oke");
        try {
            $rumah = Rumah::findOrFail($id);
            $rumah->delete();
            return redirect()->back()->with('success', 'Data rumah anggota komunitas berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data rumah anggota keluarga gagal dihapus');
        }
    }

    //hapus data warga
    public function destroyWarga($id)
    {
        // dd("oke");
        try {
            $rumah = Rumah::findOrFail($id);
            $rumah->delete();
            return redirect()->back()->with('success', 'Data warga anggota komunitas berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data warga anggota komunitas gagal dihapus');
        }
    }
}
