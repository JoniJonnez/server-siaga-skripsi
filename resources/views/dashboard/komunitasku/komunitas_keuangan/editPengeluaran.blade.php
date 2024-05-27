@extends('dashboard.layouts.main')
@section('title', 'Edit Pengeluaran')
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
                        <li class="breadcrumb-item">
                            <a href="{{ route('komunitas.index') }}">Pengaturan Keuangan</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Pengeluaran</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Pengeluaran</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form action="{{ route('pengeluaran.updatePengeluaran', $pengeluaran['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group mb-4">
                            <label for="nama" class="col-form-label" style="font-size: 14px;">Nama
                                pengeluaran
                                keuangan</label>
                            <input class="form-control mb-2" name="nama" type="text" id="nama"
                                value="{{ old('nama', $pengeluaran['nama']) }}" placeholder="nama pengeluaran keuangan">

                            <label for="keterangan" class="col-form-label" style="font-size: 14px;">Keterangan
                                pengeluaran keuangan</label>
                            <input class="form-control mb-2" name="keterangan" type="text" id="keterangan"
                                value="{{ old('keterangan', $pengeluaran['keterangan']) }}"
                                placeholder="keterangan pengeluaran keuangan">

                            <label for="jumlah" class="col-form-label" style="font-size: 14px;">Jumlah
                                pengeluaran
                                keuangan</label>
                            <input class="form-control mb-2" name="jumlah" type="text" id="jumlah"
                                value="{{ old('jumlah', $pengeluaran['jumlah']) }}"
                                placeholder="jumlah pengeluaran keuangan">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="bulan" class="col-form-label" style="font-size: 14px;">Bulan
                                        pengeluaran</label>
                                    <select class="form-control form-control-sm" name="bulan" type="text"
                                        id="bulan">
                                        <option value="" selected disabled>Pilih Bulan Pengeluaran</option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '01') selected @endif value="01">Januari
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '02') selected @endif value="02">Februari
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '03') selected @endif value="03">Maret
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '04') selected @endif value="04">April
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '05') selected @endif value="05">Mei
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '06') selected @endif value="06">Juni
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '07') selected @endif value="07">Juli
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '08') selected @endif value="08">Agustus
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '09') selected @endif value="09">September
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '10') selected @endif value="10">Oktober
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '11') selected @endif value="11">November
                                        </option>
                                        <option @if ($pengeluaran && $pengeluaran['bulan'] === '12') selected @endif value="12">Desember
                                        </option>

                                    </select>
                                    @error('bulan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="tahun" class="col-form-label" style="font-size: 14px;">Tahun
                                        pengeluaran</label>
                                    <input class="form-control form-control-sm mb-1" name="tahun" type="text"
                                        id="tahun" value="{{ old('tahun', $pengeluaran['tahun']) }}"
                                        placeholder="Masukan Tahun Pengeluaran"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    @error('tahun')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-danger waves-effect px-4 mr-2"
                                onclick="window.location.href = '{{ route('pengeluaran.create', ['komunitas_id' => $getKomunitas['id']]) }}'">Batal</button>
                            <button class="btn btn-success px-4" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
