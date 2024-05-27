<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Informasi;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreInformasiRequest;
use App\Http\Requests\UpdateInformasiRequest;
use App\Models\Pengaduan;

class InformasiController extends Controller
{


    /**
     * Halaman Informasi Admin
     */
    public function index()
    {
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $informasi = Informasi::latest()->get();
        $pengaduan = Pengaduan::latest()->get();
        $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        return view('dashboard.Komunitasku.komunitas_informasi.informasi-admin', compact('komunitasKu', 'informasi', 'komunitas', 'getKomunitas', 'memberKomunitas', 'pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $informasi = Informasi::latest()->get();
        return view('dashboard.Komunitasku.komunitas_informasi.tambah-informasi', compact('komunitasKu', 'komunitas', 'informasi', 'memberKomunitas', 'getKomunitas'));
    }

    // halaman detail informasi komunitas
    public function show(Informasi $informasi)
    {
        $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $informasi = Informasi::findOrFail($informasi->id);
        return view('dashboard.Komunitasku.komunitas_informasi.detail-informasi', compact('informasi', 'komunitasKu', 'getKomunitas', 'memberKomunitas'));
    }

    /**
     * Proses tambah informasi komunitas
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $request->validate([
            'user_id' => '',
            'komunitas_id' => '',
            'judul_informasi' => 'required',
            'deskripsi_singkat' => 'required',
            'isi_informasi' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);
        try {
            $validated = $request->except('_token');
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
                $validated['file'] = $file->storeAs('file_informasi', $fileName, 'public'); // Menyimpan file dengan nama asli
            }
            Informasi::create($validated);
            $komunitas_id = $request->input('komunitas_id');
            return to_route('informasi.index', ['komunitas_id' => $komunitas_id])->with('success', 'Informasi berhasil ditambah.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Informasi gagal ditambah.');
        }

        return redirect()->back()->with('success', 'Informasi berhasil ditambah.');
    }
    // public function store(Request $request)
    // {
    //     $request['user_id'] = Auth::user()->id;
    //     $request->validate([
    //         'user_id' => '',
    //         'judul_informasi' => 'required',
    //         'deskripsi_singkat' => 'required',
    //         'isi_informasi' => 'required',
    //         'file' => 'required|mimes:pdf,doc,docx|max:2048',
    //     ]);
    //     try {
    //         if ($request->hasFile('file')) {
    //             $request->file('file')->store('file_informasi');
    //         }
    //         Informasi::create($request->all());
    //         return to_route('informasi.index')->with('success', 'Informasi berhasil ditambah.');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Informasi gagal ditambah.');
    //     }

    //     return redirect()->back()->with('success', 'Informasi berhasil ditambah.');
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInformasiRequest $request, Informasi $informasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyInfo($id)
    {
        // dd("oke");
        try {
            $informasi = Informasi::findOrFail($id);
            $informasi->delete();
            return back()->with('success', 'Data iuran berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data iuran gagal dihapus');
        }
    }
}
