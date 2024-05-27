<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Rumah;
use App\Models\Informasi;
use App\Models\Komunitas;
use App\Models\SuratPengajuan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\IuranPengguna;
use App\Models\PengajuanKomunitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreKomunitasRequest;
use App\Http\Requests\UpdateKomunitasRequest;
use App\Http\Requests\StorePengajuanKomunitasRequest;

class KomunitasController extends Controller
{
    public $allKomunitas;
    public function __construct()
    {
        $this->allKomunitas = Komunitas::all();
    }

    // halaman komunitas
    public function index()
    {
        $suratPengajuan = SuratPengajuan::get();
        $surats = DB::table('surats')->get();
        $pengeluaran = Pengeluaran::get();
        $iuranPengguna = IuranPengguna::get();
        $iuran = Iuran::query()->latest()->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitas = Komunitas::all();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $informasi = Informasi::query()->latest()->get();
        $rumah = Rumah::query()->latest()->get();
        $getKomunitas = null; // Inisialisasi variabel $getKomunitas dengan nilai null
        $iurans = IuranPengguna::query()->latest()->get();
        return view('dashboard.Komunitasku.komunitas', compact(
            'iurans',
            'komunitas',
            'rumah',
            'informasi',
            'getKomunitas',
            'komunitasKu',
            'memberKomunitas',
            'iuran',
            'iuranPengguna',
            'pengeluaran',
            'surats',
            'suratPengajuan'
        ));
    }

    // menampikan halaman komunitas di sidebar
    public function show($id)
    {
        $suratPengajuan = SuratPengajuan::get();
        $surats = DB::table('surats')->get();
        $pengeluaran = Pengeluaran::get();
        $iuranPengguna = IuranPengguna::get();
        $iuran = Iuran::query()->latest()->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $getKomunitas = Komunitas::findOrFail($id);
        $statusPengurus = Komunitas::where('user_id', Auth::user()->id)
            ->where("id", $id)->first();
        $komunitas = Komunitas::all();
        $informasi = Informasi::query()->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $rumah = Rumah::query()->latest()->get();
        $iuranPenggunas = IuranPengguna::query()->latest()->get();
        return view('dashboard.Komunitasku.komunitas', compact(
            'iuranPenggunas',
            'komunitas',
            'rumah',
            'informasi',
            'getKomunitas',
            'komunitasKu',
            'memberKomunitas',
            'iuran',
            'statusPengurus',
            'iuranPengguna',
            'pengeluaran',
            'surats',
            'suratPengajuan'
        ));
    }


    /**
     * cari komunitas di menu komunitas
     */
    public function cari()
    {
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        if (
            request('cariKomunitas')
        ) {
            $searchKomunitas = Komunitas::where('nama_komunitas', 'like', '%' . request('cariKomunitas') . '%')->paginate(3);
        } else {
            $searchKomunitas = Komunitas::paginate(3);
        }
        $komunitas = Komunitas::paginate(2);
        return view('dashboard.komunitas.cari-komunitas', compact('komunitas', 'searchKomunitas', 'komunitasKu', 'memberKomunitas'));
    }

    //menampikan halaman menampilkan komunitas yang di pilih di halaman cari kommunitas
    public function showkomunitas($id)
    {
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitas_id = $id;
        $getKomunitas = Komunitas::findOrFail($id);
        $komunitas = Komunitas::get();
        $informasi = Informasi::query()->latest()->get();
        $rumah = Rumah::query()->latest()->get();
        return view('dashboard.komunitas.gabung', compact('rumah', 'informasi', 'getKomunitas', 'komunitas', 'komunitas_id', 'komunitasKu', 'memberKomunitas'));
    }

    // halaman pengajuan komunitas
    public function pengajuanKomunitas($komunitasId)
    {
        // dd('oke');
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        return view('dashboard.komunitas.pengajuan-komunitas', compact('komunitasKu', 'komunitas', 'memberKomunitas', 'komunitasId'));
    }

    //hakaman profil komunitas
    public function halamanProfil(Request $request)
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail($request->komunitas_id); // Inisialisasi variabel $getKomunitas dengan nilai null
        return view('dashboard.komunitasku.komunitas_profil.profil-admin', compact('komunitas', 'getKomunitas', 'komunitasKu', 'memberKomunitas'));
    }


    // halaman detail iuran komunitas
    public function iuranKomunitas($id)
    {
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $iuranPengguna = IuranPengguna::where('iuran_id', $id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.komunitasku.detail-iuran-komunitas', compact('komunitasKu', 'memberKomunitas', 'iuranPengguna', 'getKomunitas'));
    }

    //halaman buat komunitas
    public function create()
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::all();
        return view('dashboard.Komunitas.buat-komunitas', compact('komunitas', 'komunitasKu', 'memberKomunitas'));
    }

    /**
     * Halaman Buat Komunitas
     */
    public function actioncreate(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $request->validate([
            'user_id' => '',
            'nama_komunitas' => 'required',
            'moto_komunitas' => 'required',
            'alamat_komunitas' => 'required',
            'logo_komunitas' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'provinsi' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'kabupaten' => 'required',
            'desa' => 'required',
            'deskripsi_komunitas' => ''
        ]);
        try {
            $validatedData = $request->except('_token');
            if ($request->hasFile('logo_komunitas')) {
                $validatedData['logo_komunitas'] = $request->file('logo_komunitas')->store('komunitas_image');
            }
            Komunitas::create($validatedData);
            return redirect()->back()->with('success', 'Komunitas berhasil dibuat.');
            // return redirect()->route('komunitas.show')->with('success', 'Komunitas berhasil dibuat.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Komunitas gagal dibuat.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komunitas $komunitas)
    {
        //
    }

    //halaman Update header Komunitas
    public function update(UpdateKomunitasRequest $request, $id)
    {
        $validatedData = $request->validated();
        try {
            $komunitas = Komunitas::findOrFail($id);
            if ($request->hasFile('logo_komunitas')) {
                Storage::delete($komunitas->logo_komunitas);
                $validatedData['logo_komunitas'] = $request->file('logo_komunitas')->store('komunitas_image');
            }
            $komunitas->update($validatedData);

            return redirect()->route('komunitas.show', ['id' => $komunitas->id])->with('success', 'Detail komunitas berhasil diperbarui');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data pengguna gagal diubah');
        }
    }
    // //halaman kelola komunitas
    // public function kelolaKomunitas()
    // {
    //     // $komunitas = Komunitas::all();
    //     // $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
    //     // $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas", "rumahs.id as rumah_id")
    //     //     ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
    //     //     ->where('rumahs.user_id', Auth::user()->id)->get();
    //     return view('dashboard.lainnya.kelola-komunitas.kelola-komunitas');
    // }
}
