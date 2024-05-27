@extends('dashboard.layouts.main')
@section('title', 'Tambah Data Keluarga')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('profil-keluarga.index') }}">Profil Keluarga</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Data Keluarga</li>
                    </ol>
                </div>
                <br>
                <h4 class="page-title">Data Keluarga</h4>
            </div>
        </div>

        <div class="card-body bg-white rounded shadow">
            <form action="{{ route('profil-keluarga.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_anggota_keluarga" class="col-form-label" style="font-size: 14px;">Nama Anggota
                        Keluarga</label>
                    <div class="mb-2">
                        <input class="form-control" name="nama_anggota_keluarga" type="text" id="nama_anggota_keluarga"
                            value="{{ old('nama_anggota_keluarga') }}" placeholder="Masukan Nama Anggota Keluarga"
                            pattern="[^0-9]+" required oninput="this.value=this.value.replace(/[0-9]/g,'');">
                        @error('nama_anggota_keluarga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <label for="hubungan_keluarga" class="col-form-label" style="font-size: 14px;">Hubungan Keluarga</label>
                    <div class="mb-2">
                        <select class="form-control" name="hubungan_keluarga" type="text" id="hubungan_keluarga">
                            <option selected disabled>Pilih Status Keluarga</option>
                            <option value="Suami">Suami</option>
                            <option value="Istri">Istri</option>
                            <option value="Anak">Anak</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('hubungan_keluarga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-2">
                        <div class="col-6">
                            <label for="jenis_kelamin" class="col-form-label" style="font-size: 14px;">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" type="text" id="jenis_kelamin">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="tanggal_lahir" class="col-form-label" style="font-size: 14px;">Tanggal Lahir</label>
                            <input class="form-control" name="tanggal_lahir" type="date" id="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <label for="agama" class="col-form-label" style="font-size: 14px;">Agama</label>
                    <div class="mb-2">
                        <select class="form-control" name="agama" type="text" id="agama">
                            <option selected disabled>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        @error('agama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="pekerjaan" class="col-form-label" style="font-size: 14px;">Pekerjaan</label>
                    <div class="mb-2">
                        <input class="form-control" name="pekerjaan" type="text" id="pekerjaan"
                            value="{{ old('pekerjaan') }}" pattern="[^0-9]+" required
                            oninput="this.value=this.value.replace(/[0-9]/g,'');" placeholder="Masukan Pekerjaan Anda">
                        @error('pekerjaan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="phone" class="col-form-label" style="font-size: 14px;">Nomor Telepon</label>
                    <div class="mb-2">
                        <input class="form-control" name="phone" type="text" id="phone"
                            value="{{ old('phone') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                            placeholder="Masukan Nomor Telepon Anda" required>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="email" class="col-form-label" style="font-size: 14px;">Email</label>
                    <div class="mb-2">
                        <input class="form-control" name="email" type="email" id="email"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger waves-effect px-3">BATAL</button> --}}
                    <a href="{{ route('profil-keluarga.index') }}" class="btn btn-danger waves-effect px-3">BATAL</a>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection
