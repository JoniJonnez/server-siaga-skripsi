@extends('dashboard.layouts.main')
@section('title', 'Edit Iuran')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Komunitasku</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('komunitas.index') }}">Komunitas</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Iuran</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Iuran</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('iuranKomunitas.update', $iuran['id']) }}" method="POST" enctype="multipart/form-data">
                @method('patch')
                @csrf
                {{-- @foreach ($iuran as $data) --}}
                <div class="form-group">
                    <label for="nama_iuran" class="col-form-label" style="font-size: 14px;">Nama Iuran</label>
                    <div class="mb-1">
                        <input class="form-control" name="nama_iuran" type="text" id="nama_iuran"
                            value="{{ old('nama_iuran', $iuran->nama_iuran) }}" placeholder="Masukan Nama Iuran">
                        @error('nama_iuran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="jumlah" class="col-form-label" style="font-size: 14px;">Jumlah</label>
                    <div class="mb-3 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input class="form-control" name="jumlah" type="text" id="jumlah"
                            value="{{ old('jumlah', str_replace('.', '', number_format($iuran['jumlah'], 0, ',', '.'))) }}"
                            placeholder="Masukkan Nominal Pembayaran Iuran" onkeypress="return hanyaAngka(event)"
                            data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 3, 'digitsOptional': false, 'placeholder': '0'">
                        @error('jumlah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="periode" class="col-form-label" style="font-size: 14px;">Periode Pembayaran</label>
                    <div class="mb-2">
                        <select class="form-control" name="periode" type="text" id="periode">
                            @if ($iuran->periode === 'sekali')
                                <option selected value="sekali">Sekali</option>
                            @else
                                <option value="sekali">Sekali</option>
                            @endif
                            @if ($iuran->periode === 'perminggu')
                                <option selected value="perminggu">Perminggu</option>
                            @else
                                <option value="perminggu">Perminggu</option>
                            @endif
                            @if ($iuran->periode === 'perbulan')
                                <option selected value="perbulan">Perbulan</option>
                            @else
                                <option value="perbulan">Perbulan</option>
                            @endif
                            @if ($iuran->periode === 'pertahun')
                                <option selected value="pertahun">Pertahun</option>
                            @else
                                <option value="pertahun">Pertahun</option>
                            @endif
                        </select>
                        @error('periode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="status_iuran" class="col-form-label" style="font-size: 14px;">Status Iuran</label>
                    <div class="mb-2">
                        <select class="form-control" name="status_iuran" type="text" id="status_iuran">
                            @if ($iuran->status_iuran === 'wajib')
                                <option selected value="wajib">Wajib</option>
                            @else
                                <option value="wajib">Wajib</option>
                            @endif
                            @if ($iuran->status_iuran === 'sukarela')
                                <option selected value="sukarela">Sukarela</option>
                            @else
                                <option value="sukarela">Sukarela</option>
                            @endif
                        </select>
                        @error('status_iuran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="pj_iuran" class="col-form-label" style="font-size: 14px;">Penanggung Jawab</label>
                    <div class="mb-2">
                        <select class="form-control" name="pj_iuran" type="text" id="pj_iuran">
                            @if ($iuran->pj_iuran === 'pemilik')
                                <option selected value="pemilik">Pemilik</option>
                            @else
                                <option value="pemilik">Pemilik</option>
                            @endif
                            @if ($iuran->pj_iuran === 'penghuni')
                                <option selected value="penghuni">Penghuni</option>
                            @else
                                <option value="penghuni">Penghuni</option>
                            @endif
                            @if ($iuran->pj_iuran === 'semua')
                                <option selected value="semua">Semua</option>
                            @else
                                <option value="semua">Semua</option>
                            @endif
                        </select>
                        @error('pj_iuran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <h5>Metode Pembayaran</h5>
                    <label for="nama_bank" class="col-form-label" style="font-size: 14px;">1.&nbsp;&nbsp;M-Banking</label>
                    <div class="mb-2 mr-2">
                        <select class="form-control ml-2" name="nama_bank" type="text" id="nama_bank">
                            <option selected disabled>Pilih nama bank</option>
                            @if ($iuran->nama_bank === 'mandiri')
                                <option selected value="mandiri">Bank Mandiri</option>
                            @else
                                <option value="mandiri">Bank Mandiri</option>
                            @endif
                            @if ($iuran->nama_bank === 'bca')
                                <option selected value="bca">Bank Central Asia (BCA)</option>
                            @else
                                <option value="bca">Bank Central Asia (BCA)</option>
                            @endif
                            @if ($iuran->nama_bank === 'bri')
                                <option selected value="bri">Bank Rakyat Indonesia (BRI)</option>
                            @else
                                <option value="bri">Bank Rakyat Indonesia (BRI)</option>
                            @endif
                            @if ($iuran->nama_bank === 'bni')
                                <option selected value="bni">Bank Negara Indonesia (BNI)</option>
                            @else
                                <option value="bni">Bank Negara Indonesia (BNI)</option>
                            @endif
                        </select>
                        @error('nama_bank')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-1 ml-1">
                        <div class="row mb-2">
                            <div class="col-6">
                                <label for="no_rekening" class="col-form-label" style="font-size: 14px;">Nomor
                                    Rekening</label>
                                <input class="form-control" name="no_rekening" type="text" id="no_rekening"
                                    value="{{ old('no_rekening', $iuran['no_rekening']) }}"
                                    placeholder="Masukan Nomor Rekening Anda" onkeypress="return hanyaAngka(event)">
                                @error('no_rekening')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="pemilik_rekening" class="col-form-label" style="font-size: 14px;">Nama
                                    Pemilik Rekening</label>
                                <input class="form-control" name="pemilik_rekening" type="text" id="pemilik_rekening"
                                    value="{{ old('pemilik_rekening', $iuran['pemilik_rekening']) }}"
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
                            @if ($iuran->nama_wallet === 'gopay')
                                <option selected value="gopay">GoPay (Gojek)</option>
                            @else
                                <option value="gopay">GoPay (Gojek)</option>
                            @endif
                            @if ($iuran->nama_wallet === 'ovo')
                                <option selected value="ovo">OVO</option>
                            @else
                                <option value="ovo">OVO</option>
                            @endif
                            @if ($iuran->nama_wallet === 'dana')
                                <option selected value="dana">Dana</option>
                            @else
                                <option value="dana">Dana</option>
                            @endif
                            @if ($iuran->nama_wallet === 'shopeepay')
                                <option selected value="shopeepay">ShopeePay</option>
                            @else
                                <option value="shopeepay">ShopeePay</option>
                            @endif
                        </select>
                        @error('nama_wallet')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2 ml-1">
                        <div class="row">
                            <div class="col-6">
                                <label for="no_wallet" class="col-form-label" style="font-size: 14px;">Nomor
                                    E-Wallet</label>
                                <input class="form-control" name="no_wallet" type="text" id="no_wallet"
                                    value="{{ old('no_wallet', $iuran['no_wallet']) }}"
                                    placeholder="Masukan Nomor E-Wallet Anda" onkeypress="return hanyaAngka(event)">
                                @error('no_wallet')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="pemilik_ewallet" class="col-form-label" style="font-size: 14px;">Nama
                                    Pemilik Rekening</label>
                                <input class="form-control" name="pemilik_ewallet" type="text" id="pemilik_ewallet"
                                    value="{{ old('pemilik_ewallet', $iuran['pemilik_ewallet']) }}"
                                    placeholder="Masukan Nama Pemilik Rekening">
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
                {{-- @endforeach --}}
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
