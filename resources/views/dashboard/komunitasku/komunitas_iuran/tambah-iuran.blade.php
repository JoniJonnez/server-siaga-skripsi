@extends('dashboard.layouts.main')
@section('title', 'Tambah Iuran')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Komunitasku</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('komunitas.index') }}">Komunitas</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Iuran</li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Iuran</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('iuranKomunitas.store', ['komunitas_id' => $getKomunitas['id']]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_iuran" class="col-form-label" style="font-size: 14px;">Nama Iuran</label>
                    <div class="mb-1">
                        <input class="form-control" name="nama_iuran" type="text" id="nama_iuran"
                            value="{{ old('nama_iuran') }}" placeholder="Masukan Nama Iuran">
                        @error('nama_iuran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="jumlah" class="col-form-label" style="font-size: 14px;">Jumlah</label>
                    <div class="mb-3 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input class="form-control" name="jumlah" type="text" id="jumlah" value="{{ old('jumlah') }}"
                            placeholder="Masukkan Nominal Pembayaran Iuran" onkeypress="return hanyaAngka(event)"
                            data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 3, 'digitsOptional': false, 'placeholder': '0'">
                        @error('jumlah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="periode" class="col-form-label" style="font-size: 14px;">Periode Pembayaran</label>
                    <div class="mb-2">
                        <select class="form-control" name="periode" type="text" id="periode">
                            <option selected disabled>Pilih jenis periode pembayaran</option>
                            <option value="sekali">Sekali</option>
                            <option value="perbulan">Perbulan</option>
                        </select>
                        @error('periode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="status_iuran" class="col-form-label" style="font-size: 14px;">Status Iuran</label>
                    <div class="mb-2">
                        <select class="form-control" name="status_iuran" type="text" id="status_iuran">
                            <option selected disabled>Pilih jenis status iuran</option>
                            <option value="wajib">Wajib</option>
                            <option value="sukarela">Sukarela</option>
                        </select>
                        @error('status_iuran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="pj_iuran" class="col-form-label" style="font-size: 14px;">Yang membayar iuran</label>
                    <div class="mb-4">
                        <select class="form-control" name="pj_iuran" type="text" id="pj_iuran">
                            <option selected disabled>Pilih jenis yang wajib membayar</option>
                            <option value="pemilik">Pemilik</option>
                            <option value="penghuni">Penghuni</option>
                            <option value="semua">Semua</option>
                        </select>
                        @error('pj_iuran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <h5>Metode Pembayaran</h5>
                    <label for="nama_bank" class="col-form-label" style="font-size: 14px;">1.&nbsp;&nbsp;M-Banking</label>
                    <div class="mb-2 mr-2">
                        <select class="form-control ml-2" name="nama_bank" type="text" id="nama_bank">
                            <option selected disabled>Pilih nama bank</option>
                            <option value="mandiri">Bank Mandiri</option>
                            <option value="bca">Bank Central Asia (BCA)</option>
                            <option value="bri">Bank Rakyat Indonesia (BRI)</option>
                            <option value="bni">Bank Negara Indonesia (BNI)</option>
                        </select>
                    </div>
                    <div class="mb-1 ml-2">
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="no_rekening" class="col-form-label" style="font-size: 14px;">Nomor
                                    Rekening</label>
                                <input class="form-control" name="no_rekening" type="text" id="no_rekening"
                                    value="{{ old('no_rekening') }}" placeholder="Masukan Nomor Rekening Anda"
                                    onkeypress="return hanyaAngka(event)">
                                @error('no_rekening')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="pemilik_rekening" class="col-form-label" style="font-size: 14px;">Nama
                                    Pemilik Rekening</label>
                                <input class="form-control" name="pemilik_rekening" type="text" id="pemilik_rekening"
                                    value="{{ old('pemilik_rekeningpemilik_rekening') }}"
                                    placeholder="Masukan Nama Pemilik Rekening">
                                @error('pemilik_rekening')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <label for="nama_wallet" class="col-form-label ml-1"
                        style="font-size: 14px;">2.&nbsp;&nbsp;E-Wallet</label>
                    <div class="mb-2 mr-2">
                        <select class="form-control ml-2" name="nama_wallet" type="text" id="nama_wallet">
                            <option selected disabled>Pilih nama E-Wallet</option>
                            <option value="gopay">GoPay (Gojek)</option>
                            <option value="ovo">OVO</option>
                            <option value="dana">Dana</option>
                            <option value="shopeepay">ShopeePay</option>
                        </select>
                    </div>
                    <div class="mb-2 ml-2">
                        <div class="row">
                            <div class="col-6">
                                <label for="no_wallet" class="col-form-label" style="font-size: 14px;">Nomor
                                    E-Wallet</label>
                                <input class="form-control" name="no_wallet" type="text" id="no_wallet"
                                    value="{{ old('no_wallet') }}" placeholder="Masukan Nomor E-Wallet Anda"
                                    onkeypress="return hanyaAngka(event)">
                                @error('no_wallet')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="pemilik_ewallet" class="col-form-label" style="font-size: 14px;">Nama Pemilik
                                    E-Wallet</label>
                                <input class="form-control" name="pemilik_ewallet" type="text" id="pemilik_ewallet"
                                    value="{{ old('pemilik_ewallet') }}" placeholder="Masukan Nama Pemilik E-Wallet">
                                @error('pemilik_ewallet')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success px-3 float-right">Simpan</button>
                <button type="button" class="btn btn-danger mr-2 px-4 float-right"
                    onclick="window.location.href='{{ route('iuranKomunitas.index', ['komunitas_id' => $getKomunitas['id']]) }}'">Batal</button>
            </form>
        </div>
    </div>
@endsection

<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>

<script>
    // Initialize Inputmask
    $(document).ready(function() {
        $('#jumlah').inputmask();
    });
</script>
