@extends('dashboard.layouts.main')
@section('title', 'Form Pengaduan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Lainnya</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('pengaduan.index') }}">Pengaduan</a>
                        </li>
                        <li class="breadcrumb-item active">Form Pengaduan</li>
                    </ol>
                </div>
                <h4 class="page-title">Form Pengaduan</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="komunitas_id" value="{{ $getKomunitas['id'] }}">
                        <div class="form-group">
                            <label for="lokasi_kejadian" class="col-form-label">Lokasi Kejadian</label>
                            <input class="form-control" name="lokasi_kejadian" type="text" id="lokasi_kejadian"
                                value="{{ old('lokasi_kejadian') }}" required>
                            @error('lokasi_kejadian')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="waktu_kejadian" class="col-form-label">Waktu Kejadian</label>
                            <input class="form-control" name="waktu_kejadian" type="date" id="waktu_kejadian"
                                value="{{ old('waktu_kejadian') }}" required>
                            @error('waktu_kejadian')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="penyebab_kejadian" class="col-form-label">Penyebab Kejadian</label>
                            <input class="form-control" name="penyebab_kejadian" type="text" id="penyebab_kejadian"
                                value="{{ old('penyebab_kejadian') }}" pattern="[^0-9]+" required
                                oninput="this.value=this.value.replace(/[0-9]/g,'');">
                            @error('penyebab_kejadian')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul_pengaduan" class="col-form-label">Judul Pengaduan</label>
                            <input class="form-control" name="judul_pengaduan" type="text" id="judul_pengaduan"
                                value="{{ old('judul_pengaduan') }}">
                            @error('judul_pengaduan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isi_pengaduan" class="col-form-label">Isi Pengaduan</label>
                            <textarea class="form-control" name="isi_pengaduan" id="isi_pengaduan" rows="5"
                                placeholder="Isi Detail Pengaduan Anda" required>{{ old('isi_pengaduan') }}</textarea>
                            @error('isi_pengaduan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="foto_pengaduan">Pilih Gambar</label>
                            <input type="file" class="form-control-file" id="foto_pengaduan" name="foto_pengaduan"
                                accept="image/*" required>
                            @error('foto_pengaduan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-danger btn-sm col-1 mr-2" data-repeater-delete=""
                                onclick="window.location.href = '{{ route('pengaduan.index', ['komunitas_id' => $getKomunitas['id']]) }}';">KEMBALI</button>
                            <button type="submit" class="btn btn-primary btn-sm col-1">KIRIM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
