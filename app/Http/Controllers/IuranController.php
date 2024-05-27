<?php

namespace App\Http\Controllers;

use App\Models\Iuran;
use App\Models\Rumah;
use App\Models\Komunitas;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\IuranPengguna;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIuranRequest;
use App\Http\Requests\UpdateIuranRequest;

class IuranController extends Controller
{
    // halaman iuran admin
    public function index()
    {
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        // $iuran = Iuran::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $komunitas = Komunitas::get();
        // Ambil data iuran berdasarkan komunitas_id dan urutkan berdasarkan created_at secara descending
        $iuran = Iuran::where('komunitas_id', request('komunitas_id'))->orderByDesc('created_at')->get();
        // Cetak data $iuran untuk debugging
        // dd($iuran);
        return view('dashboard.komunitasku.komunitas_iuran.iuran-admin', compact('komunitasKu', 'iuran', 'komunitas', 'getKomunitas', 'memberKomunitas'));
    }

    //halaman konfirmasi iuran
    public function konfirmasiIuran()
    {
        // dd("oke");
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $iuranPenggunas = IuranPengguna::get();
        // $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        return view('dashboard.komunitasku.komunitas_iuran.konfirmasi-iuran', compact('komunitas', 'getKomunitas', 'komunitasKu', 'memberKomunitas', 'iuranPenggunas'));
    }

    //halaman detail konfirmasi iuran
    public function detailKonfirmasi()
    {
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id')); // Inisialisasi variabel $getKomunitas dengan nilai null
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $iuranPenggunaId = request('iuranPengguna_id');
        $iuranPenggunas = IuranPengguna::findOrFail($iuranPenggunaId);
        return view('dashboard.komunitasku.komunitas_iuran.detail-konfirmasi-iuran', compact('iuranPenggunas', 'komunitasKu', 'memberKomunitas', 'getKomunitas'));
    }

    public function BayarIuran()
    {
        $iuranId = request('iuran_id');
        $komunitasId = request('komunitas_id');
        $iuran = Iuran::findOrFail($iuranId);
        $getKomunitas = Komunitas::findOrFail($komunitasId);
        $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.komunitasku.komunitas_iuran.bayar-iuran', compact('komunitasKu', 'memberKomunitas', 'getKomunitas', 'iuran'));
    }

    //halaman tambah iuran
    public function create()
    {
        $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $iuran = Iuran::latest()->get();
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        return view('dashboard.komunitasku.komunitas_iuran.tambah-iuran', compact('iuran', 'komunitas', 'getKomunitas', 'komunitasKu', 'memberKomunitas'));
    }

    /**
     * Proses tambah data iuran
     */
    public function store(Request $request)
    {
        $request->validate([
            'komunitas_id' => '',
            'nama_iuran' => 'required',
            'jumlah' => 'required',
            'periode' => 'required',
            'status_iuran' => 'required',
            'pj_iuran' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'pemilik_rekening' => 'required',
            'nama_wallet' => 'required',
            'no_wallet' => 'required',
            'pemilik_ewallet' => 'required'
        ]);

        try {
            $iuran = Iuran::create($request->all());

            $notifikasi = Notifikasi::create([
                'notifikasi' => 'Pemberitahuan: Iuran Baru Telah Ditambahkan, dengan nama :' . $iuran->nama_iuran,
                'status' => 'penting',
                'deskripsi' => 'Admin telah menambahkan iuran baru ke dalam sistem. Mohon periksa detailnya untuk informasi lebih lanjut.',
            ]);

            $komunitas_id = $request->input('komunitas_id');
            return redirect()->route('iuranKomunitas.index', ['komunitas_id' => $komunitas_id])->with('success', 'Iuran berhasil ditambah.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Iuran gagal ditambah.');
        }
    }
    // public function store(Request $request)
    // {
    //     // dd($request->all());
    //     $request->validate([
    //         'komunitas_id' => '',
    //         'nama_iuran' => 'required',
    //         'jumlah' => 'required',
    //         'periode' => 'required',
    //         'status_iuran' => 'required',
    //         'pj_iuran' => 'required',
    //         'nama_bank' => 'required',
    //         'no_rekening' => 'required',
    //         'pemilik_rekening' => 'required',
    //         'nama_wallet' => 'required',
    //         'no_wallet' => 'required',
    //         'pemilik_ewallet' => 'required'
    //     ]);
    //     try {
    //         Iuran::create($request->all());
    //         $komunitas_id = $request->input('komunitas_id');
    //         return to_route('iuranKomunitas.index', ['komunitas_id' => $komunitas_id])->with('success', 'Iuran berhasil ditambah.');
    //         // return to_route('iuranKomunitas.index',)->with('komunitas_id', $request->komunitas_id)->with('success', 'Iuran berhasil ditambah.');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Iuran gagal ditambah.');
    //     }
    //     return redirect()->back()->with('success', 'Iuran berhasil ditambah.');
    // }

    //proses bayar iuran
    public function storeBayar(Request $request)
    {
        // dd($request->all());
        $request['user_id'] = Auth::user()->id;
        $request->validate([
            'user_id' => '',
            'komunitas_id' => '',
            'iuran_id' => 'required',
            'metode_pembayaran' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'bukti_pembayaran' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048'
        ]);
        // dd($request);
        try {
            $validated = $request->except('_token');
            if ($request->hasFile('bukti_pembayaran')) {
                $file = $request->file('bukti_pembayaran');
                $fileName = $file->getClientOriginalName();
                $validated['bukti_pembayaran'] = $file->storeAs('bukti_pembayaran', $fileName, 'public');
            }
            $validated['iuran_id'] = request('id_iuran');
            // dd($validated);
            IuranPengguna::create($validated);
            $komunitas_id = $request->input('komunitas_id');
            return redirect()->route('komunitas.show', $komunitas_id)->with('success', 'Iuran berhasil bayar.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Iuran gagal ditambah.');
        }
        return redirect()->back()->with('success', 'Iuran berhasil ditambah.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Iuran $iuran)
    {
        //
    }

    /**
     * Halaman Edit iuran komunitas
     */
    public function edit($iuran)
    {
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $iuran = Iuran::findOrFail($iuran);
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::where('user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        // $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        return view('dashboard.komunitasku.komunitas_iuran.edit-iuran', compact('iuran', 'komunitasKu', 'memberKomunitas', 'getKomunitas'));
    }

    /**
     * halaman update iuran komunitas
     */
    public function update(UpdateIuranRequest $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validated();
        // dd($validatedData);
        try {
            $iuran = Iuran::findOrFail($id);

            $iuran->update($validatedData);
            return redirect()->route('iuranKomunitas.index', ['komunitas_id' => $iuran->komunitas_id])->with('success', 'Data pengguna berhasil perbaharui');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data pengguna gagal diubah');
        }
    }

    // proses tanggapan iuran
    public function updateTanggapan(Request $request, $iuranPenggunas)
    {
        // Validasi input
        $request->validate([
            'tanggapan_iuran' => 'required|string|max:255'
        ]);

        // Ambil data IuranPengguna berdasarkan id yang diberikan
        $data = IuranPengguna::find($iuranPenggunas);

        // Perbarui tanggapan_iuran sesuai dengan input yang divalidasi
        $tanggapan = $request->input('tanggapan_iuran');
        $data->tanggapan_iuran = $tanggapan;
        $data->save();

        return redirect()->back()->with('success', 'Pembayaran Iuran berhasil diperbarui.');
    }

    //proses update status pembayaran
    public function updateStatus()
    {
        $ids = request('ids');
        $status = request('status_updatate');
        $iuranPengguna = IuranPengguna::find($ids);
        $iuranPengguna->update([
            'status_pembayaran' => $status
        ]);
        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    /**
     * proses hapus jenis iuran
     */
    public function destroyIuran($id)
    {
        // dd("oke");
        try {
            $iuran = Iuran::findOrFail($id);
            $iuran->delete();
            return back()->with('success', 'Data iuran berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Data iuran gagal dihapus');
        }
    }
}
