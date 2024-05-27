<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Komunitas;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePengaduanRequest;
use App\Http\Requests\UpdatePengaduanRequest;

class PengaduanController extends Controller
{
    /**
     * Halaman pengaduan
     */
    public function index()
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        // $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id')); // Inisialisasi variabel $getKomunitas dengan nilai null
        // $pengaduan = Pengaduan::where('user_id', Auth::user()->id)->latest()->get();
        $pengaduan = Pengaduan::get();
        return view('dashboard.komunitasku.komunitas_informasi.pengaduan.pengaduan', compact('pengaduan', 'komunitas', 'komunitasKu', 'memberKomunitas', 'getKomunitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id')); // Inisialisasi variabel $getKomunitas dengan nilai null
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        // $getKomunitas = Komunitas::findOrFail(request('komunitas_id')); // Inisialisasi variabel $getKomunitas dengan nilai null
        return view('dashboard.komunitasku.komunitas_informasi.pengaduan.form-pengaduan', compact('komunitas', 'komunitasKu', 'memberKomunitas', 'getKomunitas'));
    }

    /**
     * proses tambah pengaduan
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request['user_id'] = Auth::user()->id;
        $request->validate([
            'user_id' => '',
            'komunitas_id' => '',
            'lokasi_kejadian' => 'required',
            'waktu_kejadian' => 'required',
            'penyebab_kejadian' => 'required',
            'judul_pengaduan' => 'required',
            'isi_pengaduan' => 'required',
            'foto_pengaduan' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        // dd($request);
        try {
            $validated = $request->except('_token');
            if ($request->hasFile('foto_pengaduan')) {
                $file = $request->file('foto_pengaduan');
                $validated['foto_pengaduan'] = $file->store('pengaduan_image', 'public');
            }
            Pengaduan::create($validated);
            $komunitas_id = $request->input('komunitas_id');
            return to_route('pengaduan.index', ['komunitas_id' => $komunitas_id])->with('success', 'Pengaduan berhasil dikirim.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Pengaduan gagal dikirim.');
        }

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim.');
    }

    /**
     * Display the specified resource.
     */
    public function show($pengaduan)
    {
        // dd("test");
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id')); // Inisialisasi variabel $getKomunitas dengan nilai null
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $pengaduan = Pengaduan::find($pengaduan);
        return view('dashboard.komunitasku.komunitas_informasi.pengaduan.detail-pengaduan', compact('pengaduan', 'komunitasKu', 'komunitas', 'memberKomunitas', 'getKomunitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    //proses update status di pengaduan
    public function updateStatus()
    {
        $ids = request('ids');
        $status = request('status_updatate');
        $pengaduan = Pengaduan::find($ids);
        $pengaduan->update([
            'status_pengaduan' => $status
        ]);
        return back()->with('success', 'Status pengaduan berhasil diperbarui.');
    }

    //Update balasan pengaduan
    public function update(UpdatePengaduanRequest $request, $pengaduan)
    {
        $validated = $request->validated();
        $data = Pengaduan::find($pengaduan);
        $tanggapan = $validated['tanggapan_pengaduan'];
        $data->update([
            'tanggapan_pengaduan' => $tanggapan
        ]);
        return redirect()->route('pengaduan.index', ['komunitas_id' => $data->komunitas_id])->with('success', 'Pengaduan berhasil diperbarui.');
        // return redirect()->route('pengaduan.index')->with('success-updatePengaduan', 'Pengaduan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyInfo($id)
    {
        // dd("oke");
        try {
            $pengaduan = Pengaduan::findOrFail($id);
            $pengaduan->delete();
            return back()->with('success', 'Data pengaduan berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data pengaduan gagal dihapus');
        }
    }
}
