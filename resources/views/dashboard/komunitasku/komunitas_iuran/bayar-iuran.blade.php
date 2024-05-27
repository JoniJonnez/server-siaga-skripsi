@extends('dashboard.layouts.main')
@section('title', 'Detail Iuran')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Komunitasku</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('komunitas.index') }}">Komunitas</a>
                        </li>
                        <li class="breadcrumb-item active">Bayar iuran</li>
                    </ol>
                </div>
                <h4 class="page-title">Bayar Iuran</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ route('bayarIuran.storeBayar', ['komunitas_id' => $getKomunitas['id'], 'id_iuran' => request('iuran_id')]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="komunitas_id" value="{{ $getKomunitas['id'] }}">
                        <div class="form-group">
                            <label for="iuran_id" class="col-form-label" style="font-size: 14px;">Jenis Iuran</label>
                            <input class="form-control" name="iuran_id" type="text" readonly id="iuran_id"
                                value="{{ $iuran->nama_iuran }}">

                            <label for="metode_pembayaran" class="col-form-label" style="font-size: 14px;">Metode
                                Pembayaran</label>
                            <select class="form-control mb-2" name="metode_pembayaran" type="text"
                                id="metode_pembayaran">
                                <option>Pilih Metode Pemabayarn</option>
                                <option value="No.Rekening">Nomor Rekening</option>
                                <option value="E-Wallet">E-Wallet</option>
                                <option value="Cash">Cash</option>
                            </select>
                            @error('metode_pembayaran')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <label for="jumlah" class="col-form-label" style="font-size: 14px;">Jumlah</label>
                            <div class="mb-2 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input class="form-control" name="jumlah" type="text" id="jumlah"
                                    value="{{ old('jumlah', number_format($iuran->jumlah, 0, '', '')) }}"
                                    placeholder="Masukkan Nominal Pembayaran Iuran" onkeypress="return hanyaAngka(event)"
                                    data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 3, 'digitsOptional': false, 'placeholder': '0'">
                                @error('jumlah')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <label for="keterangan" class="col-form-label" style="font-size: 14px;">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" rows="4" placeholder="Isi keterangan pembayaran"></textarea>
                            @error('keterangan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bukti_pembayaran" style="font-size: 14px;">Pilih Gambar</label>
                            <input type="file" class="form-control-file" id="bukti_pembayaran" name="bukti_pembayaran"
                                accept="image/*" required>
                        </div>
                        @error('bukti_pembayaran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-success px-4 float-right">KIRIM</button>
                        <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                            onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">KEMBALI</button>
                        {{-- <button type="button" class="btn btn-danger mr-2 px-3 float-right"
                            onclick="window.location.href='{{ route('komunitas.index', ['komunitas_id' => $getKomunitas['id']]'">KEMBALI</button> --}}
                    </form>
                </div>
            </div>
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
