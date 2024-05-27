<?php

use App\Models\{Iuran, IuranPengguna, Notifikasi, Komunitas, PengajuanKomunitas, ProfilKeluarga, Rumah};
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SuratController,
    ProfileController,
    AkunKeuanganController,
    IuranController,
    PenggunaController
};
use App\Models\Pengaduan;
use App\Models\Informasi;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\BuatSuratController;
use App\Http\Controllers\EditIuranController;
use App\Http\Controllers\EditRumahController;
use App\Http\Controllers\EditWargaController;
use App\Http\Controllers\KomunitasController;
use App\Http\Controllers\KelolaKomunitasController;
use App\Http\Controllers\KelolaPenggunaController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\BayarIuranController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\DetailSuratController;
use App\Http\Controllers\TambahIuranController;
use App\Http\Controllers\BuatKomunitasController;
use App\Http\Controllers\CariKomunitasController;
use App\Http\Controllers\EditDataSuratController;
use App\Http\Controllers\FormPengaduanController;
use App\Http\Controllers\ProfilKeluargaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DetailInformasiController;
use App\Http\Controllers\DetailPengaduanController;
use App\Http\Controllers\KonfirmasiIuranController;
use App\Http\Controllers\TambahInformasiController;
use App\Http\Controllers\PengaturanAksesInfoController;
use App\Http\Controllers\PengaturanKomunitasController;
use App\Http\Controllers\DetailKonfirmasiIuranController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('index');
});

Route::get('/carikomunitas', function () {
    return view('dashboard.guest.cari_komunitas');
});

Route::get('/percobaan', function () {
    return view('dashboard.komunitas.coba');
});

// Auth
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile-update-photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');
    Route::get('/profile-delete-photo', [ProfileController::class, 'deletePhoto'])->name('profile.delete-photo');
});


//controller dasboard
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('', function () {
        // Ambil ID user yang sedang login
        $userId = Auth::user()->id;

        $iuranPenggunas = IuranPengguna::where('user_id', $userId)
            ->where('status_pembayaran', 'lunas')
            ->get();
        $rumahs = Rumah::where('user_id', $userId)
            ->where('status_komunitas', 'diterima')
            ->get();

        // Menghitung total iuran berdasarkan komunitas id yang sesuai dengan user login dari tabel rumah
        $totalIuran = Iuran::whereIn('komunitas_id', function ($query) use ($userId) {
            $query->select('komunitas_id')
                ->from('rumahs')
                ->where('user_id', $userId);
        })->sum('jumlah');

        // Menghitung total iuran pengguna yang sudah lunas
        $totalIuranLunas = $iuranPenggunas->sum('jumlah');

        // Menghitung total iuran yang belum lunas (total iuran dikurangi iuran pengguna yang sudah lunas)
        $totalIuranBelumLunas = $totalIuran - $totalIuranLunas;

        // Menghitung total rumah berdasarkan komunitas id yang sesuai dengan user login
        $totalRumah = Rumah::whereIn('komunitas_id', function ($query) use ($userId) {
            $query->select('komunitas_id')
                ->from('rumahs')
                ->where('user_id', $userId);
        })->count();

        $pengaduan = Pengaduan::get();
        $informasi = Informasi::get();
        $profilKeluarga = ProfilKeluarga::where('user_id', $userId)->get();
        $komunitas = Komunitas::all();
        $komunitasKu = Komunitas::where('user_id', Auth::user()->id)->get();
        $memberKomunitas = Rumah::select("komunitas.id as komunitas_id", "komunitas.nama_komunitas as nama_komunitas")
            ->join("komunitas", "komunitas.id", "=", "rumahs.komunitas_id")
            ->where('rumahs.user_id', Auth::user()->id)
            ->where('status_komunitas', 'diterima')
            ->get();

        $hasRumah = $rumahs->isNotEmpty();

        return view('dashboard.index', compact('komunitas', 'komunitasKu', 'memberKomunitas', 'iuranPenggunas', 'rumahs', 'profilKeluarga', 'pengaduan', 'informasi', 'totalRumah', 'totalIuranBelumLunas', 'hasRumah'));
    })->name('dashboard');

    //Profil Keluarga
    Route::resource('profil-keluarga', ProfilKeluargaController::class);
    Route::patch('/profilKeluarga/{id}/edit', [ProfilKeluargaController::class, 'update'])->name('profilKeluarga.update');
    Route::get('/profilkeluarga/{id}', [ProfilKeluargaController::class, 'destroy'])->name('profilkeluarga.destroy');

    //halaman Pengaduan
    Route::resource('pengaduan', PengaduanController::class);
    Route::post('update-status-pengaduan', [PengaduanController::class, 'updateStatus'])->name('pengaduan.updateStatus');
    Route::get('/hapusPengaduan/{id}', [PengaduanController::class, 'destroyInfo'])->name('hapusPengaduan.destroy');


    //komunitas
    Route::resource('komunitas', KomunitasController::class);
    Route::get('komunitas/{id}/', [KomunitasController::class, 'show'])->name('komunitas.show');
    Route::get('HalamanIuran/{id}', [KomunitasController::class, 'iuranKomunitas'])->name('HalamanIuran.iuranKomunitas');
    // Route::get('/hapuswarga/{id}', [RumahController::class, 'destroyWarga'])->name('hapuswarga.destroyWarga');

    //halaman komunitas > pencarian komunitas
    Route::get('cariKomunitas', [KomunitasController::class, 'cari'])->name('cariKomunitas.cari');
    Route::post('/komunitas', [RumahController::class, 'storePengajuan'])->name('komunitas.storePengajuan');
    // menampilkan halaman yang sudah di cari
    Route::get('/carikomunitas/{id}', [KomunitasController::class, 'showkomunitas'])->name('carikomunitas.showkomunitas');

    // halaman pengajuan bergabung ke komunitas
    Route::get('/pengajuanKomunitas/{id}', [KomunitasController::class, 'pengajuanKomunitas'])->name('pengajuanKomunitas.pengajuanKomunitas');
    // halaman persetujuan bergabung ke komunitas
    Route::get('/approvalKomunitas', [RumahController::class, 'approval'])->name('approvalKomunitas.approval');
    Route::resource('/Approval', ApprovalController::class);
    Route::post('/Approval-pengajuan', [ApprovalController::class, 'updateStatus'])->name('pengajuan.updateStatus');

    //halaman komunitas > Profil
    Route::get('/komunitas/create', [KomunitasController::class, 'create'])->name('komunitas.create');
    Route::post('/buatkomunitas', [KomunitasController::class, 'actioncreate'])->name('buatkomunitas.actioncreate');
    Route::get('komunitas-halamanProfil', [KomunitasController::class, 'halamanProfil'])->name('komunitas.halamanProfil');

    //halaman komunitas > Rumah dan warga
    Route::resource('rumah', RumahController::class);
    Route::patch('/WargaRumah/{id}/edit', [RumahController::class, 'updateWarga'])->name('WargaRumah.updateWarga');
    Route::patch('/dataRumah/{id}/edit', [RumahController::class, 'updateRumah'])->name('dataRumah.updateRumah');
    Route::get('/hapusrumah/{id}', [RumahController::class, 'destroy'])->name('hapusrumah.destroy');
    Route::get('/hapuswarga/{id}', [RumahController::class, 'destroyWarga'])->name('hapuswarga.destroyWarga');
    Route::post('/rumah/{id}/setujubergabung', [RumahController::class, 'setuju'])->name('setujubergabung.setuju');
    Route::post('/rumah/{id}/tolakbergabung', [RumahController::class, 'tolak'])->name('tolakbergabung.tolak');
    Route::get('wargaKomunitas', [RumahController::class, 'indexWarga'])->name('wargaKomunitas.indexWarga');

    //halaman komunitas > admin > surat
    Route::resource('surat', SuratController::class);
    Route::get('detailsurat/{id}', [SuratController::class, 'detailSurat'])->name('detailsurat.detailSurat');
    Route::get('detailpengajuan/{id}', [SuratController::class, 'detailPengajuan'])->name('detailpengajuan.detailPengajuan');
    Route::get('pengajuan-surat', [SuratController::class, 'Pengajuan'])->name('pengajuan-surat.Pengajuan');
    Route::patch('/surat/{id}/edit', [SuratController::class, 'updateSurat'])->name('surat.updateSurat');
    Route::get('/hapussurat/{id}', [SuratController::class, 'destroy'])->name('hapussurat.destroy');
    Route::get('/hapusPengajuan/{id}', [SuratController::class, 'destroyPengajuan'])->name('hapusPengajuan.destroyPengajuan');
    Route::get('/dashboard/pilih_jenis_surat', 'SuratController@getSyaratByJenisSurat');
    Route::post('update-status-surat', [SuratController::class, 'updateStatusSurat'])->name('surat.updateStatusSurat');


    //halaman komunitas > Informasi
    Route::resource('informasi', InformasiController::class);
    Route::get('/hapusInformasi/{id}', [InformasiController::class, 'destroyInfo'])->name('hapusInformasi.destroy');

    //halaman komunitas > Pengaturan
    Route::resource('pengaturanKomunitas', PengaturanKomunitasController::class);

    //halaman komunitas > Iuran
    Route::resource('iuranKomunitas', IuranController::class);
    Route::post('bayarIuran', [IuranController::class, 'storeBayar'])->name('bayarIuran.storeBayar');
    Route::get('iuranWarga/{id}', [IuranController::class, 'destroyIuran'])->name('iuranWarga.destroyIuran');
    Route::get('iuranKomunitas.konfirmasiIuran', [IuranController::class, 'konfirmasiIuran'])->name('iuranKomunitas.konfirmasiIuran');
    // Route::get('iuranKomunitas.detailKonfirmasi', [IuranController::class, 'detailKonfirmasi'])->name('iuranKomunitas.detailKonfirmasi');
    Route::post('update-status-pembayaran', [IuranController::class, 'updateStatus'])->name('pembayaran.updateStatus');
    Route::post('update-tanggapan-pembayaran/{iuranPenggunas}', [IuranController::class, 'updateTanggapan'])->name('pembayaran.updateTanggapan');
    Route::get('detailKonfirmasiIuran', [IuranController::class, 'detailKonfirmasi'])->name('detailKonfirmasiIuran.detailKonfirmasi');
    Route::get('halamanBayarIuran', [IuranController::class, 'BayarIuran'])->name('halamanBayarIuran.BayarIuran');

    //halaman komunitas > Keuangan
    Route::resource('keuangan', KeuanganController::class);
    Route::post('dataKeuangan', [KeuanganController::class, 'searchByDate'])->name('dataKeuangan.searchByDate');
    Route::get('pengeluaran', [KeuanganController::class, 'create'])->name('pengeluaran.create');
    Route::patch('/pengeluaran/{id}/edit', [KeuanganController::class, 'updatePengeluaran'])->name('pengeluaran.updatePengeluaran');
    // Route::get('/pengeluaran/{id}', [KeuanganController::class, 'Pengeluaran'])->name('pengeluaran.updatePengeluaran');
    Route::get('/hapusPengeluaran/{id}', [KeuanganController::class, 'destroy'])->name('hapusPengeluaran.destroy');
    Route::get('/keuangancetak_pdf', [KeuanganController::class, 'cetakpdf'])->name('keuangancetakpdf.cetakpdf');

    Route::get('komunitas-halamanPengurus', [KomunitasController::class, 'halamanPengurus'])->name('komunitas.halamanPengurus');

    //halaman komunitas > Surat
    Route::resource('surat', SuratController::class);
    Route::patch('/surat/{id}/edit', [SuratController::class, 'updateKategori'])->name('surat.updateKategori');
    Route::post('get-surat', [SuratController::class, 'getSurat'])->name('surat.getSurat');
    Route::get('tambahsurat', [SuratController::class, 'addSurat'])->name('tambahsurat.addSurat');
    Route::post("tambahsuratpengajuan", [SuratController::class, "tambahSuratPengajuan"]);
    Route::get("pilih_jenis_surat", [SuratController::class, "detail_jenis"]);
    //Halaman menu notifikasi
    Route::resource('notifikasi', NotifikasiController::class);
    Route::get('/get-notifikasi/{id}', 'NotifikasiController@getNotifikasi');

    //Halaman menu lainnya -> kelola komunitas
    Route::resource('/kelolaKomunitas', KelolaKomunitasController::class);
    Route::get('kelolaKomunitas/{id}/', [KelolaKomunitasController::class, 'show'])->name('kelolaKomunitas.show');
    Route::get('/kelolaKomunitas/{id}', [KelolaKomunitasController::class, 'destroy'])->name('kelolaKomunitas.destroy');
    // Route::delete('/kelolaKomunitas/{id}', [KelolaKomunitasController::class, 'destroy'])->name('kelolaKomunitas.destroy');

    //Halaman menu lainnya -> kelola pengguna
    Route::resource('kelolaPengguna', KelolaPenggunaController::class);







    Route::resource('pengaturan', PengaturanController::class);
    // Profile Edit Akses
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('pengaturan-akses-info', PengaturanAksesInfoController::class);
    // Route::resource('form-pengaduan', FormPengaduanController::class);
    Route::resource('detail-surat', DetailSuratController::class);
    Route::resource('buat-surat', BuatSuratController::class);
    Route::resource('edit-data-surat', EditDataSuratController::class);
    Route::resource('pengurus', PengurusController::class);
    Route::resource('pengaturan-komunitas', PengaturanKomunitasController::class);
    Route::resource('bayar-iuran', BayarIuranController::class);
});

require __DIR__ . '/auth.php';
