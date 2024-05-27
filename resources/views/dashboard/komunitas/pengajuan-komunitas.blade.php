@extends('dashboard.layouts.main')
@section('title', 'Pengajuan Komunitas')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Cari Komunitas</li>
                    <li class="breadcrumb-item">
                        <a href="{{ url()->previous() }}">Detail Komunitas</a>
                    </li>
                    <li class="breadcrumb-item active">Pengajuan Komunitas</li>
                </ol>
            </div>
            <h4 class="page-title">Form Pengajuan</h4>
            Pondok Kelapa, Duren Sawit, Jakarta Timur.
        </div>
    </div>

    <div class="card bg-transparent shadow-none">
        <div class="crad bg-white">
            <div class="card-body">
                <form action="{{ route('komunitas.storePengajuan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="jalan" class="col-form-label">Jalan</label>
                        <input class="form-control form-control-sm mb-1" name="jalan" type="text" id="jalan"
                            value="{{ old('jalan') }}" placeholder="Nama jalan rumah anda">
                        @error('jalan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <input class="form-control form-control-sm mb-1" name="komunitas_id" type="text"
                            id="komunitas_id" value="{{ $komunitasId }}" hidden>

                        <label for="rt" class="col-form-label">RT</label>
                        <input class="form-control form-control-sm mb-1" name="rt" type="text" id="rt"
                            value="{{ old('rt') }}" placeholder="Masukan RT rumah anda"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        @error('rt')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="rw" class="col-form-label">RW</label>
                        <input class="form-control form-control-sm mb-1" name="rw" type="text" id="rw"
                            value="{{ old('rw') }}" placeholder="Masukan RW rumah anda"
                            onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        @error('rw')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="blok" class="col-form-label">Blok</label>
                        <input class="form-control form-control-sm mb-1" name="blok" type="text" id="blok"
                            value="{{ old('blok') }}" placeholder="Masukan nama blok anda">
                        @error('blok')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="kode_rumah" class="col-form-label">Kode Rumah</label>
                        <input class="form-control form-control-sm mb-1" name="kode_rumah" type="text" id="kode_rumah"
                            value="{{ old('kode_rumah') }}" placeholder="Masukan kode rumah anda">
                        @error('kode_rumah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="status_hunian" class="col-form-label">Status Hunian</label>
                        <div class="mb-1">
                            <select class="form-control form-control-sm" name="status_hunian" type="text"
                                id="status_hunian" value="{{ old('status_hunian') }}">
                                <option selected disabled>Pilih Status Hunian</option>
                                <option value="pemilik">Pemilik</option>
                                <option value="penghuni">Penghuni</option>
                                {{-- <option value="pemilik/penghuni">Pemilik & Penghuni</option> --}}
                            </select>
                            @error('status_hunian')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <p>Dihuni sejak</p>
                    <div class="row mb-3">
                        <div class="col-6">
                            <select class="form-control form-control-sm" name="bulan_huni" type="text" id="bulan_huni"
                                value="{{ old('bulan_huni') }}">
                                <option selected disabled>Pilih bulan huni</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                            @error('bulan_huni')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <input class="form-control form-control-sm mb-1" name="tahun_huni" type="text"
                                id="tahun_huni" value="{{ old('tahun_huni') }}" placeholder="Kapan menempati rumah ini"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                            @error('rt')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="foto">Pilih Gambar</label>
                        <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*"
                            required>
                        @error('foto')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-sm px-3 float-right">SIMPAN</button>
                    <button type="button" class="btn btn-danger btn-sm col-1 float-right mr-2 mb-3"
                        onclick="window.location.href = '{{ url()->previous() }}'">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection
