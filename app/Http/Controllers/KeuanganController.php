<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Rumah;
use App\Models\Keuangan;
use App\Models\Komunitas;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\IuranPengguna;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKeuanganRequest;
use App\Http\Requests\UpdateKeuanganRequest;
// use PDF;


class KeuanganController extends Controller
{
    //halaman keuangan
    public function index(Request $request)
    {
        $komunitas_id = request('komunitas_id');
        if (request('caritahun') && request('caribulan')) {
            $caribulan =  request('caribulan');
            $caritahun = request('caritahun');
            $startdate = $caritahun . '-' . $caribulan . '-01';;
            $finishdate = $caritahun . '-' . $caribulan . '-31';;
        } else {
            $startdate = date('Y') . '-' . date('m') . '-01';
            $finishdate = date('Y') . '-' . date('m') . '-31';
            $caribulan =  date('m');
            $caritahun =  date('Y');
        }
        $iuranPengguna = IuranPengguna::whereBetween('created_at', [$startdate, $finishdate])
            ->where('status_pembayaran', 'lunas')
            ->where('komunitas_id', $komunitas_id)->get();
        $pengeluaran = Pengeluaran::where('bulan', $caribulan)
            ->where('tahun', $caritahun)
            ->where('komunitas_id', $komunitas_id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $komunitas = Komunitas::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        return view('dashboard.komunitasku.komunitas_keuangan.keuangan-admin', compact('komunitasKu', 'komunitas', 'getKomunitas', 'memberKomunitas', 'pengeluaran', 'iuranPengguna'));
    }

    /**
     * Halaman Pengeluaran
     */
    public function create()
    {
        // dd("oke");
        $pengeluaran = Pengeluaran::get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.komunitasku.komunitas_keuangan.pengeluaran', compact('komunitasKu', 'memberKomunitas', 'getKomunitas', 'pengeluaran'));
    }

    /**
     * Proses tambah pengeluaran
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => '',
            'komunitas_id' => '',
            'nama' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        try {
            $validatedData = $request->except('_token');
            $validatedData['user_id'] = Auth::user()->id;
            // dd($validatedData);
            Pengeluaran::create($validatedData);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data rumah gagal ditambah.');
        }
        return redirect()->back()->with('success', 'Data rumah berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Halaman Edit Pengeluaran
     */
    public function edit($id)
    {
        // dd("oke");
        $pengeluaran = Pengeluaran::findOrFail($id);
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.komunitasku.komunitas_keuangan.editPengeluaran', compact('komunitasKu', 'memberKomunitas', 'getKomunitas', 'pengeluaran'));
    }

    //proses fitur pencarian data keuangan berdasarkan bulan dan tahun
    public function searchByDate(Request $request)
    {
        // dd($request->all());
        $request->input('month');
        $request->input('year');

        // return redirect('/keuangan?komunitas_id=' . $request->input('komunitas_id') . '&cari=' . $request->input('cari'));
        return redirect()->route('keuangan.index', [
            'komunitas_id' => $request->input('komunitas_id'),
            'caritahun' => $request->input('year'),
            'caribulan' => $request->input('month')
        ]);
    }

    //proses update pengeluaran
    public function updatePengeluaran(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
        ]);
        try {
            $pengeluaran = Pengeluaran::findOrFail($id);
            $pengeluaran->update($request->all());
            return redirect()->route('pengeluaran.create', ['komunitas_id' => $pengeluaran->komunitas_id])->with('success', 'Data warga berhasil diperbaharui');
            // return redirect()->back()->with('success', 'Data Pengeluaran berhasil Update.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data pengeluaran gagal Update.');
        }
    }

    //proses hapus data pengeluaran
    public function destroy($id)
    {
        try {
            $pengeluaran = Pengeluaran::findOrFail($id);
            $pengeluaran->delete();
            return redirect()->back()->with('success', 'Data Pengeluaran berhasil dihapus.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data pengeluaran gagal dihapus.');
        }
    }

    public function cetakpdf()
    {
        $keuangan = Keuangan::all();
        // $iuranPengguna = IuranPengguna::get();
        // $pengeluaran = Pengeluaran::get();
        if (request('caritahun') && request('caribulan')) {
            $caribulan =  request('caribulan');
            $caritahun = request('caritahun');
            $startdate = $caritahun . '-' . $caribulan . '-01';;
            $finishdate = $caritahun . '-' . $caribulan . '-31';;
        } else {
            $startdate = date('Y') . '-' . date('m') . '-01';
            $finishdate = date('Y') . '-' . date('m') . '-31';
            $caribulan =  date('m');
            $caritahun =  date('Y');
        }
        $iuranPengguna = IuranPengguna::whereBetween('created_at', [$startdate, $finishdate])
            ->where('status_pembayaran', 'lunas')
            ->where('komunitas_id', request('komunitas_id'))->get();
        $pengeluaran = Pengeluaran::where('bulan', $caribulan)
            ->where('tahun', $caritahun)
            ->where('komunitas_id', request('komunitas_id'))->get();

        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));

        $dompdf = new Dompdf();
        $html = view('dashboard.komunitasku.komunitas_keuangan.keuangan_pdf', [
            'keuangan' => $keuangan,
            'iuranPengguna' => $iuranPengguna,
            'pengeluaran' => $pengeluaran,
            'getKomunitas' => $getKomunitas,
        ])->render();
        // $html = view('dashboard.komunitasku.komunitas_keuangan.keuangan_pdf', ['keuangan' => $keuangan])->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('laporan-keuangan-pdf');
    }
}
