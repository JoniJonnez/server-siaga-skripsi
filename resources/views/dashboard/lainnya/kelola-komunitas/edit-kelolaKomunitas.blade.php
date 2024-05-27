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
                <form action="{{ route('kelolaKomunitas.update', $komunitas['id']) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="nama_komunitas" class="col-form-label" style="font-size: 14px;">Nama Komunitas</label>
                        <div class="mb-1">
                            <input class="form-control form-control-sm" name="nama_komunitas" type="text"
                                id="nama_komunitas" value="{{ old('nama_komunitas', $komunitas->nama_komunitas) }}"
                                placeholder="Masukan Nama Komunitas" readonly>
                        </div>
                        <label for="user_id" class="col-form-label" style="font-size: 14px;">Pemilik Komunitas</label>
                        <div class="mb-1">
                            <select class="form-control form-control-sm" name="user_id" id="user_id">
                                <option value="" disabled selected>Pilih Pemilik Komunitas</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if ($komunitas->user_id == $user->id) selected @endif>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="moto_komunitas" class="col-form-label" style="font-size: 14px;">Moto Komunitas</label>
                        <div class="mb-1">
                            <input class="form-control form-control-sm" name="moto_komunitas" type="text"
                                id="moto_komunitas" value="{{ old('moto_komunitas', $komunitas->moto_komunitas) }}"
                                placeholder="pilih Pemilik Komunitas" readonly>
                        </div>
                        <label for="alamat_komunitas" class="col-form-label" style="font-size: 14px;">Alamat
                            Komunitas</label>
                        <div class="mb-1">
                            <input class="form-control form-control-sm" name="alamat_komunitas" type="text"
                                id="alamat_komunitas" value="{{ old('alamat_komunitas', $komunitas->alamat_komunitas) }}"
                                placeholder="pilih Pemilik Komunitas" readonly>
                        </div>
                        <label for="alamat_komunitas" class="col-form-label" style="font-size: 14px;">Deskripsi
                            Komunitas</label>
                        <div class="mb-1">
                            <textarea name="deskripsi_komunitas" id="deskripsi_komunitas" rows="4" class="form-control form-control-sm"
                                placeholder="Masukan deskripsi komunitas" readonly>{{ old('deskripsi_komunitas', $komunitas->deskripsi_komunitas) }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success px-3 float-right">Simpan</button>
                    <button type="button" class="btn btn-danger mr-2 px-4 float-right"
                        onclick="window.location.href='{{ route('kelolaKomunitas.index') }}'">Batal</button>
                </form>
            </div>
        </div>
    </div>
@endsection
