<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use App\Models\Surat;
use App\Models\SuratPengajuan;
use App\Models\Komunitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    // Halaman surat admin
    public function index()
    {
        $surat = Surat::get();
        $surats = DB::table('surats')->get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        return view('dashboard.komunitasku.komunitas_surat.surat-admin', compact(
            'getKomunitas',
            'surats',
            'surat',
            'komunitasKu',
            'memberKomunitas',
        ));
    }

    // Halaman detail surat
    public function detailSurat($id)
    {
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $suratPengajuan = SuratPengajuan::find($id);
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.komunitasku.komunitas_surat.detail-surat', compact(
            'komunitasKu',
            'memberKomunitas',
            'suratPengajuan',
            'getKomunitas',
        ));
    }

    // Halaman detail surat
    public function detailPengajuan($id)
    {
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $suratPengajuan = SuratPengajuan::find($id);
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        return view('dashboard.komunitasku.komunitas_surat.detail-pengajuan-surat', compact(
            'komunitasKu',
            'memberKomunitas',
            'suratPengajuan',
            'getKomunitas',
        ));
    }

    //halaman buat surat
    public function addSurat()
    {
        $surat = Surat::get();
        $surats = DB::table('surats')->get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        return view('dashboard.komunitasku.komunitas_surat.buat-surat', compact(
            'getKomunitas',
            'komunitasKu',
            'memberKomunitas',
            'surat',
            'surats'
        ));
    }

    //halaman edit katagori surat
    public function edit($id)
    {
        // dd('oke');
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $surat = Surat::find($id);
        return view('dashboard.komunitasku.komunitas_surat.edit-kategori-surat', compact(
            'surat',
            'komunitasKu',
            'memberKomunitas',
            'getKomunitas',
        ));
    }

    //proses penambahan kategori surat
    public function store(Request $request)
    {
        try {
            $container = [];
            foreach ($request->data as $d) {
                $container[] = $d;
            }

            $dcd = json_encode($container);
            DB::table('surats')->insert([
                'komunitas_id' => $request->komunitas_id,
                'jenis_surat' => $request->jenis_surat,
                'syarat' => $dcd,
            ]);
            return back()->with('success', 'Kategori surat berhasil ditambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'Kategori surat gagal ditambahkan');
        }
    }

    // proses update kategori surat
    public function updateKategori(Request $request, $id)
    {
        try {
            $container = [];
            foreach ($request->data as $d) {
                $container[] = $d;
            }

            $dcd = json_encode($container);

            // Update data kategori surat berdasarkan ID
            DB::table('surats')
                ->where('id', $id)
                ->update([
                    'jenis_surat' => $request->jenis_surat,
                    'syarat' => $dcd,
                ]);
            $komunitas_id = $request->komunitas_id;
            return to_route('surat.index', ['komunitas_id' => $komunitas_id])->with('success', 'Surat berhasil di perbaharui');
            // return back()->with('success', 'Kategori surat berhasil diperbarui');
        } catch (\Throwable $th) {
            return back()->with('error', 'Kategori surat gagal diperbarui');
        }
    }
    // public function updateKategori(Request $request, $id)
    // {
    //     try {
    //         $container = [];
    //         foreach ($request->data as $d) {
    //             $container[] = $d;
    //         }

    //         $dcd = json_encode($container);
    //         DB::table('surats')->insert([
    //             'jenis_surat' => $request->jenis_surat,
    //             'syarat' => $dcd,
    //         ]);
    //         return back()->with('success', 'Kategori surat berhasil ditambahkan');
    //     } catch (\Throwable $th) {
    //         return back()->with('error', 'Kategori surat gagal ditambahkan');
    //     }
    // }

    //proses ambil data surat
    public function getSurat(Request $request)
    {
        $srt = DB::table('surats')->where('jenis_surat', $request->jenis_surat)->first();
        return response()->json([
            'data' => $srt->syarat,
        ]);
    }

    //detail surat
    public function detail_jenis(Request $req)
    {
        $syarat = Surat::where("id", $req->id_jenis)->first();

        if ($syarat) {

            $detail = json_decode($syarat->syarat, true);

            // Create an array of objects for each syarat
            $checkboxData = [];
            foreach ($detail as $syarat => $value) {
                $checkboxData[] = ['syarat' => $syarat, 'value' => $value];
            }


            return response()->json($checkboxData);
        } else {
            echo "Surat not found.";
        }
    }

    // halaman pengajuan pembuatan surat
    public function Pengajuan()
    {
        // dd('oke');
        $suratPengajuan = SuratPengajuan::get();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)->where('status_komunitas', 'diterima')->get();
        $getKomunitas = Komunitas::findOrFail(request('komunitas_id'));
        return view('dashboard.komunitasku.komunitas_surat.dataPengajuanSurat', compact(
            'komunitasKu',
            'memberKomunitas',
            'getKomunitas',
            'suratPengajuan',
        ));
    }

    //proses update data kategori surat
    public function updateSurat(Request $request, $id)
    {
        try {
            $container = [];
            foreach ($request->data as $d) {
                $container[] = $d;
            }

            $dcd = json_encode($container);

            // Lakukan update data surat berdasarkan ID
            DB::table('surats')->where('id', $id)->update([
                'jenis_surat' => $request->jenis_surat,
                'syarat' => $dcd,
            ]);

            return back()->with('success', 'Kategori surat berhasil diperbarui');
        } catch (\Throwable $th) {
            return back()->with('error', 'Kategori surat gagal diperbarui');
        }
    }


    // Proses hapus kategori surat
    public function destroy($id)
    {
        try {
            $surat = Surat::findOrFail($id);
            $surat->delete();
            return back()->with('success', ' Kategori surat berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Kategori surat gagal dihapus');
        }
    }

    // Proses hapus surat pengajuan
    public function destroyPengajuan($id)
    {
        try {
            $suratPengajuan = SuratPengajuan::findOrFail($id);
            $suratPengajuan->delete();
            return back()->with('success', 'Pengajuan surat berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('error', 'Pengajuan surat gagal dihapus');
        }
    }

    // Halaman pengajuan surat
    public function getSyaratByJenisSurat(Request $request)
    {
        $id_jenis = $request->input('id_jenis');

        // Contoh data syarat (Ubah ini sesuai dengan struktur tabel Anda)
        $syarat = [
            ['syarat' => 'syarat_1', 'value' => 'Syarat 1'],
            ['syarat' => 'syarat_2', 'value' => 'Syarat 2'],
            ['syarat' => 'syarat_3', 'value' => 'Syarat 3'],
        ];

        return response()->json($syarat);
    }

    // proses buat pengajuan surat
    public function tambahSuratPengajuan(Request $request)
    {
        // dd($request->keperluan_surat);
        try {
            $surat = Surat::where("id", $request->jenis_surat)->first();
            $data = json_decode($surat->syarat, true);
            $container = [];
            foreach ($request->syarat as $d) {
                $container[] = $d;
            }
            // Menggabungkan key dari $data dengan value dari $container
            $isianData = [];
            foreach ($data as $key => $value) {
                $isianData[$value] = isset($container[$key]) ? $container[$key] : '';
            }
            // Menyimpan data ke database
            SuratPengajuan::create([
                "user_id" => Auth::user()->id,
                "surat_id" => $request->jenis_surat,
                "komunitas_id" => $request->komunitas_id,
                "keperluan_surat" => $request->keperluan_surat,
                "isian" => json_encode($isianData),
                "created_at" => now(),
                "updated_at" => now()
            ]);
            // dd(SuratPengajuan::all());
            // return back()->with('success', 'pengajuan surat berhasil di tambahkan');
            return redirect()->route('komunitas.show', $request->komunitas_id)->with('success', 'pengajuan surat berhasil di tambahkan');
        } catch (\Throwable $th) {
            return back()->with('error', 'pengajuan surat Gagal Di tambahkan');
        }
    }

    //proses update status di surat pengajuan
    public function updateStatusSurat()
    {
        // dd('oke');
        $ids = request('ids');
        $status = request('status_updatate');
        // $pengaduan = Pengaduan::find($ids);
        $suratPengajuan = SuratPengajuan::find($ids);
        $suratPengajuan->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status Pengajuan berhasil diperbarui.');
    }
    // public function updateStatus()
    // {
    //     $ids = request('ids');
    //     $status = request('status_updatate');
    //     $suratPengajuan = SuratPengajuan::find($ids);
    //     $suratPengajuan->update([
    //         'status' => $status
    //     ]);
    //     return back()->with('success-', 'Status pengaduan berhasil diperbarui.');
    // }

    //proses update balas pengajuan surat
    public function update(Request $request, $suratPengajuan)
    {
        $request->validate([
            'file' => 'file|mimes:pdf|max:2048',
            'tanggapan_surat' => 'string|max:255'
        ]);

        try {
            // Cari data SuratPengajuan yang akan diupdate
            $data = SuratPengajuan::findOrFail($suratPengajuan);

            // Proses unggah file surat jika ada
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
                $path = $file->storeAs('file_surat', $fileName, 'public'); // Menyimpan file dengan nama asli
                $data->file = $path; // Update kolom file_surat dengan nama file yang baru
            }

            // Update kolom tanggapan_surat (jika ada)
            if ($request->has('tanggapan_surat')) {
                $data->tanggapan_surat = $request->input('tanggapan_surat');
            }

            // Simpan perubahan pada data SuratPengajuan
            $data->save();

            return redirect()->back()->with('success', 'Surat berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Surat gagal diperbarui');
        }
    }
    // public function update(Request $request, $suratPengajuan)
    // {
    //     $request->validate([
    //         'file' => 'file|mimes:pdf|max:2048',
    //         'tanggapan_surat' => 'string|max:255'
    //     ]);

    //     try {
    //         // Cari data SuratPengajuan yang akan diupdate
    //         $data = SuratPengajuan::findOrFail($suratPengajuan);

    //         // Ambil data yang telah divalidasi dari request
    //         $validated = $request->except('_token');

    //         // Proses unggah file surat jika ada
    //         if ($request->hasFile('file')) {
    //             $file = $request->file('file');
    //             $fileName = $file->getClientOriginalName(); // Mendapatkan nama asli file
    //             $path = $file->storeAs('file_surat', $fileName, 'public'); // Menyimpan file dengan nama asli
    //             $validated['file'] = $path;
    //         }

    //         // Update data SuratPengajuan dengan data yang telah divalidasi
    //         $data->update($validated);

    //         return redirect()->back()->with('success', 'Surat berhasil diperbarui');
    //     } catch (\Throwable $th) {
    //         return redirect()->back()->with('error', 'Surat gagal diperbarui');
    //     }
    // }
}
