@extends('dashboard.layouts.main')
@section('title', 'Kelola User')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Kelola Lainnya</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('kelolaPengguna.index') }}">Kelola User</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Data User</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('kelolaPengguna.update', $user['id']) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label" style="font-size: 14px;">Nama</label>
                        <div class="mb-1">
                            <input class="form-control form-control-sm" name="name" type="text" id="name"
                                value="{{ old('name', $user->name) }}" placeholder="Masukan Nama Pengguna" readonly>
                        </div>
                        <label for="status" class="col-form-label" style="font-size: 14px;">Status Pengguna</label>
                        <div class="mb-1">
                            <select class="form-control" name="status" type="text" id="status">
                                <option value="" disabled>Pilih Status Pengguna</option>
                                <option @if ($user['status'] === 'Kepala Desa') selected @endif value="Kepala Desa">Kepala Desa
                                </option>
                                <option @if ($user['status'] === 'Sekertaris Desa') selected @endif value="Sekertaris Desa">Sekertaris
                                    Desa</option>
                                <option @if ($user['status'] === 'Bendahara') selected @endif value="Bendahara">Bendahara
                                </option>
                                <option @if ($user['status'] === 'RW') selected @endif value="RW">RW</option>
                                <option @if ($user['status'] === 'RT') selected @endif value="RT">RT</option>
                                <option @if (empty($user['status']) || $user['status'] === 'Warga') selected @endif value="Warga">Warga</option>
                            </select>
                        </div>
                        <label for="email" class="col-form-label" style="font-size: 14px;">Email Pengguna</label>
                        <div class="mb-1">
                            <input class="form-control form-control-sm" name="email" type="text" id="email"
                                value="{{ old('email', $user->email) }}" placeholder="Masukan Email Pengguna" readonly>
                        </div>
                        <label for="phone" class="col-form-label" style="font-size: 14px;">Nomor Telepon Pengguna</label>
                        <div class="mb-1">
                            <input class="form-control form-control-sm" name="phone" type="text" id="phone"
                                value="{{ old('phone', $user->phone) }}" placeholder="Masukan Nomor Telepon Pengguna"
                                readonly>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <label for="nik" class="col-form-label" style="font-size: 14px;">Nomor NIK Pengguna</label>
                        <div class="mb-1">
                            <input class="form-control form-control-sm" name="nik" type="text" id="nik"
                                value="{{ old('nik', $user->nik) }}" placeholder="Masukan Nomor NIK Pengguna" readonly>
                            @error('nik')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <label for="alamat" class="col-form-label" style="font-size: 14px;">Alamat Pengguna</label>
                        <div class="mb-1">
                            <textarea name="alamat" id="alamat" rows="4" class="form-control form-control-sm"
                                placeholder="Masukan Alamat Pengguna" readonly>{{ old('alamat', $user->alamat) }}</textarea>
                            @error('alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success px-3 float-right">Simpan</button>
                    <button type="button" class="btn btn-danger mr-2 px-4 float-right"
                        onclick="window.location.href='{{ route('kelolaPengguna.index') }}'">Batal</button>
                </form>
            </div>
        </div>
    </div>
@endsection
