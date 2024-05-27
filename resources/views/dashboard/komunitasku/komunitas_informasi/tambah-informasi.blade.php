@extends('dashboard.layouts.main')
@section('title', 'Tambah Informasi')
@section('content')
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="float-right">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Komunitasku</li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('komunitas.index') }}">Komunitas</a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Informasi</li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Informasi</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="komunitas_id" value="{{ $getKomunitas['id'] }}">
                <div class="form-group">
                    <label for="judul_informasi" class="col-form-label" style="font-size: 14px;">Judul Informasi</label>
                    <div class="mb-2">
                        <input class="form-control" name="judul_informasi" type="text" id="judul_informasi"
                            value="{{ old('judul_informasi') }}">
                        @error('judul_informasi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="deskripsi_singkat" class="col-form-label" style="font-size: 14px;">Deskripsi Singkat</label>
                    <div class="mb-2">
                        <textarea class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" rows="4"
                            placeholder="Isi deskripsi singkat informasi">{{ old('deskripsi_singkat') }}</textarea>
                        @error('deskripsi_singkat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <label for="isi_informasi" class="col-form-label" style="font-size: 14px;">Isi Informasi</label>
                <textarea class="summernote mb-2" id="isi_informasi" name="isi_informasi"> {{ old('isi_informasi') }}</textarea>
                @error('isi_informasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-5">
                    <label for="file" class="col-form-label" style="font-size: 14px;">Pilih File</label>
                    <input type="file" class="form-control-file" id="file" name="file" required>
                    @error('file')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success px-4 float-right">SIMPAN</button>
                <button type="Update" class="btn btn-danger px-4 float-right mr-3"
                    onclick="window.location.href='{{ route('informasi.index', ['komunitas_id' => $getKomunitas['id']]) }}'">BATAL</button>
            </form>



        </div>
    </div>
@endsection
