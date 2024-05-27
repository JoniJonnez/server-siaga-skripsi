<!--Kumpulan modal-->
<!-- modal  Edit detail Komunitas-->
<div class="modal fade" id="editprofilModal" tabindex="-1" role="dialog" aria-labelledby="editprofilModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title text-success" id="editprofilModalLongTitle">Profil Komunitas</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('komunitas.update', $getKomunitas['id']) }}" id="form-update-akun" method="POST"
                    enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-group mb-2">
                            <label for="logo_komunitas">Pilih Gambar Logo Komunitas</label>
                            <input type="file" class="form-control-file" id="logo_komunitas" name="logo_komunitas"
                                accept="image/*">
                            @error('logo_komunitas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="logo_komunitas">Pilih Background Banner Komunitas</label>
                            <input type="file" class="form-control-file" id="logo_komunitas" name="logo_komunitas"
                                accept="image/*">
                            @error('logo_komunitas')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label for="nama_komunitas" class="col-form-label" style="font-size: 14px;">Nama
                            Komunitas</label>
                        <input class="form-control form-control-sm mb-2" name="nama_komunitas" type="text"
                            id="nama_komunitas" value="{{ old('nama_komunitas', $getKomunitas['nama_komunitas']) }}">
                        @error('nama_komunitas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="moto_komunitas" class="col-form-label" style="font-size: 14px;">Moto
                            Komunitas</label>
                        <input class="form-control form-control-sm mb-2" name="moto_komunitas" type="text"
                            id="moto_komunitas" value="{{ old('moto_komunitas', $getKomunitas['moto_komunitas']) }}">
                        @error('moto_komunitas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    <label for="jumlah_warga" class="col-form-label" style="font-size: 14px;">Jumlah
                                        Warga</label>
                                    <input class="form-control form-control-sm mb-2" name="jumlah_warga" type="text"
                                        id="jumlah_warga"
                                        value="{{ old('jumlah_warga', $getKomunitas['jumlah_warga']) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    @error('jumlah_warga')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="jumlah_rumah" class="col-form-label" style="font-size: 14px;">Jumlah
                                        Rumah</label>
                                    <input class="form-control form-control-sm mb-2" name="jumlah_rumah" type="text"
                                        id="jumlah_rumah"
                                        value="{{ old('jumlah_rumah', $getKomunitas['jumlah_rumah']) }}"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    @error('jumlah_rumah')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="no_tlp" class="col-form-label" style="font-size: 14px;">Nomor
                                Telepon</label>
                            <input class="form-control form-control-sm mb-2" name="no_tlp" type="text"
                                id="no_tlp" value="{{ old('no_tlp', $getKomunitas['no_tlp']) }}"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                            @error('no_tlp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <label for="alamat_komunitas" class="col-form-label" style="font-size: 14px;">Alamat
                        Komunitas</label>
                    <input class="form-control form-control-sm mb-2" name="alamat_komunitas" type="text"
                        id="alamat_komunitas" value="{{ old('alamat_komunitas', $getKomunitas['alamat_komunitas']) }}">
                    @error('alamat_komunitas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-4">
                        <label>Tema Warna</label>
                        <div class="row">
                            <div class="col-6">
                                <div id="cp2"
                                    class="input-group btn-group btn-group-toggle colorpicker-component">
                                    <input type="text" name="warna_primer" id="warna_primer"
                                        value="{{ old('warna_primer', $getKomunitas['warna_primer']) }}"
                                        class="form-control col-4">
                                    <span class="input-group-addon"><i></i></span>
                                    @error('warna_primer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div id="cp1"
                                    class="input-group btn-group btn-group-toggle colorpicker-component">
                                    <input type="text" name="warna_skunder" id="warna_skunder"
                                        value="{{ old('warna_skunder', $getKomunitas['warna_skunder']) }}"
                                        class="form-control col-4">
                                    <span class="input-group-addon"></span>
                                    @error('warna_skunder')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-sm btn-danger waves-effect px-4" data-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn-sm btn-success px-3">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal Edit detail Komunitas-->

<!-- Modal Iuran > tabel Iuran-->
<div class="modal fade" id="tabelIuran{{ $dataiuran->id }}" tabindex="-1" role="dialog"
    aria-labelledby="popupModalLabel" aria-hidden="true">
    <div class="modal-dialog ml-auto modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title text-success" id="exampleModalLongTitle">Tambah Data
                    Pengeluaran</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h4>isi modal</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Edit keuangan berdasarkan bulan Di pake --}}
<div class="modal fade" id="keuangan-edit-input" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ml-auto modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>INPUT LAPORAN KEUANGAN</h4>
                <form action="">
                    <div class="mb-2">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6">
                                        <input class="form-control" style="height: 30px;" name="tahun"
                                            type="text" readonly id="tahun" value="2023">
                                        <label for="tahun"><i>Tahun</i></label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" style="height: 30px;" name="bulan"
                                            type="text" readonly id="bulan" value="Januari">
                                        <label for="bulan"><i>Bulan</i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <h5>Saldo Awal Kas & Bank</h5>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="rom-group border-0">
                                        101 Bank BCA
                                    </div>
                                </td>
                                <td style="width: 50%">
                                    <div class="rom-group">
                                        <input type="text"
                                            style="border: none;
                                            ">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%">
                                    <div class="rom-group border-0">
                                        <strong>Total Saldo awal & Bank</strong>
                                    </div>
                                </td>
                                <td style="width: 50%">
                                    <div class="rom-group">
                                        <input type="text"
                                            style="border: none;
                                            ">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <h5>Pemasukan</h5>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 50%">
                                    <div class="rom-group border-0">
                                        Iuran Wajib
                                    </div>
                                </td>
                                <td style="width: 50%">
                                    <div class="rom-group">
                                        <input type="text"
                                            style="border: none;
                                            ">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%">
                                    <div class="rom-group border-0">
                                        <strong>Total Pemasukan</strong>
                                    </div>
                                </td>
                                <td style="width: 50%">
                                    <div class="rom-group">
                                        <input type="text"
                                            style="border: none;
                                            ">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <h5>Pengeluaran</h5>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 50%">
                                    <div class="rom-group border-0">
                                        Biaya Operasional
                                    </div>
                                </td>
                                <td style="width: 50%">
                                    <div class="rom-group">
                                        <input type="text"
                                            style="border: none;
                                            ">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%">
                                    <div class="rom-group border-0">
                                        <strong>Total Pengeluaran</strong>
                                    </div>
                                </td style="width: 50%">
                                <td>
                                    <div class="rom-group">
                                        <input type="text"
                                            style="border: none;
                                            ">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>

                {{-- <div class="col-12">
                    <div class="card bg-transparent shadow-none">
                        <div class="card-body">

                        </div>
                    </div>
                </div> --}}
                <button type="button" class="btn btn-gray px-4 float-right close" data-dismiss="modal"
                    aria-label="Close">Nanti Saja</button>
                <button type="submit" class="btn btn-success px-4 float-right mr-3"
                    onclick="location.href='{{ route('komunitas.index') }}'">OK</button>
            </div>
        </div>
    </div>
</div>
{{-- EndEdit keuangan berdasarkan bulan --}}




{{-- Modals Hapus data rumah --}}
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title align-self-center mt-0" id="exampleModalLabel">
                    Data dengan kode 12A akan di hapus, apa anda ingin melanjutkan?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <button type="submit" class="btn btn-success px-4 float-right">SIMPAN</button>
                <button type="Update" class="btn btn-danger px-4 float-right mr-3">BATAL</button>
            </div>
        </div>
    </div>
</div>
{{-- End Modal Hapus data rumah --}}
