<!-- Modal tambah Pengeluaran -->
<div class="modal fade" id="tambahPengeluaran" tabindex="-1" role="dialog" aria-labelledby="popupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ml-auto modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <h4 class="modal-title text-success" id="exampleModalLongTitle">Tambah Data Pengeluaran</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="komunitas_id" value="{{ $getKomunitas['id'] }}">
                            <div class="form-group mb-4">
                                <label for="nama" class="col-form-label" style="font-size: 14px;">Nama pengeluaran
                                    keuangan</label>
                                <input class="form-control form-control-sm mb-2" name="nama" type="text"
                                    id="nama" value="{{ old('nama') }}" placeholder="nama pengeluaran keuangan">
                                @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="keterangan" class="col-form-label" style="font-size: 14px;">Keterangan
                                    pengeluaran keuangan</label>
                                <input class="form-control form-control-sm mb-2" name="keterangan" type="text"
                                    id="keterangan" value="{{ old('keterangan') }}"
                                    placeholder="keterangan pengeluaran keuangan">
                                @error('keterangan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label for="jumlah" class="col-form-label" style="font-size: 14px;">Jumlah pengeluaran
                                    keuangan</label>
                                <input class="form-control form-control-sm mb-2" name="jumlah" type="text"
                                    id="jumlah" value="{{ old('jumlah') }}"
                                    placeholder="jumlah pengeluaran keuangan">
                                @error('jumlah')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="bulan" class="col-form-label" style="font-size: 14px;">Bulan
                                            pengeluaran</label>
                                        <select class="form-control form-control-sm" name="bulan" type="text"
                                            id="bulan">
                                            <option selected disabled>Pilih Bulan Pengeluaran</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                        @error('bulan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="tahun" class="col-form-label" style="font-size: 14px;">Tahun
                                            pengeluaran</label>
                                        <input class="form-control form-control-sm mb-1" name="tahun" type="text"
                                            id="tahun" value="{{ old('tahun') }}"
                                            placeholder="Masukan Tahun Pengeluaran"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        @error('tahun')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-danger waves-effect px-4 mr-2" type="button"
                                    data-dismiss="modal">Batal</button>
                                <button class="btn btn-success px-4" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End modal tambah Pengerluaran -->

<!-- Modal Edit Data Pengeluaran -->
{{-- @foreach ($pengeluaran as $data)
    <div class="modal fade" id="editPengeluaran{{ $data['id'] }}" tabindex="-1" role="dialog"
        aria-labelledby="popupModalLabel" aria-hidden="true">
        <div class="modal-dialog ml-auto modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h4 class="modal-title text-success" id="exampleModalLongTitle">Tambah Data Pengeluaran</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('pengeluaran.updatePengeluaran', $data['id']) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="nama" class="col-form-label" style="font-size: 14px;">Nama
                                        pengeluaran
                                        keuangan</label>
                                    <input class="form-control mb-2" name="nama" type="text" id="nama"
                                        value="{{ old('nama', $data['nama']) }}"
                                        placeholder="nama pengeluaran keuangan">

                                    <label for="keterangan" class="col-form-label"
                                        style="font-size: 14px;">Keterangan
                                        pengeluaran keuangan</label>
                                    <input class="form-control mb-2" name="keterangan" type="text"
                                        id="keterangan" value="{{ old('keterangan', $data['keterangan']) }}"
                                        placeholder="keterangan pengeluaran keuangan">

                                    <label for="jumlah" class="col-form-label" style="font-size: 14px;">Jumlah
                                        pengeluaran
                                        keuangan</label>
                                    <input class="form-control mb-2" name="jumlah" type="text" id="jumlah"
                                        value="{{ old('jumlah', $data['jumlah']) }}"
                                        placeholder="jumlah pengeluaran keuangan">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <label for="bulan" class="col-form-label"
                                                style="font-size: 14px;">Bulan
                                                pengeluaran</label>
                                            <select class="form-control form-control-sm" name="bulan"
                                                type="text" id="bulan">
                                                @if ($data['bulan'] == '01')
                                                    <option value="01" selected>Januari</option>
                                                @elseif($data['bulan'] == '02')
                                                    <option value="02">Februari</option>
                                                @elseif($data['bulan'] == '03')
                                                    <option value="03">Maret</option>
                                                @elseif($data['bulan'] == '04')
                                                    <option value="04">April</option>
                                                @elseif($data['bulan'] == '05')
                                                    <option value="05">Mei</option>
                                                @elseif($data['bulan'] == '06')
                                                    <option value="06">Juni</option>
                                                @elseif($data['bulan'] == '07')
                                                    <option value="07">Juli</option>
                                                @elseif($data['bulan'] == '08')
                                                    <option value="08">Agustus</option>
                                                @elseif($data['bulan'] == '09')
                                                    <option value="09">September</option>
                                                @elseif($data['bulan'] == '10')
                                                    <option value="10">Oktober</option>
                                                @elseif($data['bulan'] == '11')
                                                    <option value="11">November</option>
                                                @elseif($data['bulan'] == '12')
                                                    <option value="12">Desember</option>
                                                @endif
                                            </select>
                                            @error('bulan')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <label for="tahun" class="col-form-label"
                                                style="font-size: 14px;">Tahun
                                                pengeluaran</label>
                                            <input class="form-control form-control-sm mb-1" name="tahun"
                                                type="text" id="tahun"
                                                value="{{ old('tahun', $data['tahun']) }}"
                                                placeholder="Masukan Tahun Pengeluaran"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                required>
                                            @error('tahun')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-danger waves-effect px-4 mr-2" type="button"
                                        data-dismiss="modal">Batal</button>
                                    <button class="btn btn-success px-4" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
<!-- End modal Edit Data Pengerluaran -->

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
                    <div class="text-right">
                        <button class="btn btn-danger waves-effect px-4 mr-2" type="button"
                            data-dismiss="modal">Batal</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- EndEdit keuangan berdasarkan bulan --}}
