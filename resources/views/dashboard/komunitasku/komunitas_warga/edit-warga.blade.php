@extends('dashboard.layouts.main')
@section('title', 'Edit Data Warga')
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
                        <li class="breadcrumb-item active">Edit data warga</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Data Warga</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('WargaRumah.updateWarga', $rumah['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group mb-2">
                            <label for="kode_rumah" class="col-form-label" style="font-size: 14px;">Kode Rumah</label>
                            <div class="mb-2">
                                <input class="form-control" name="kode_rumah" type="text" id="kode-rumah"
                                    value="{{ old('kode_rumah', $rumah->kode_rumah) }}" readonly>
                            </div>

                            <label for="user_id" class="col-form-label" style="font-size: 14px;">Nama</label>
                            <div class="mb-2">
                                <select name="user_id" class="form-control">
                                    <option value="" selected disabled> Pilih status kepemilikan</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $rumah->user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <label for="status_hunian">Status Hunian</label>
                            <div class="col-6 row">
                                <div class="col-3 custom-control custom-radio my-2">
                                    <input type="radio" id="customRadio1" name="status_hunian" value="pemilik"
                                        class="custom-control-input" @if ($rumah['status_hunian'] === 'pemilik') checked @endif>
                                    <label class="custom-control-label" for="customRadio1"
                                        style="font-size: 14px;">Pemilik</label>
                                </div>
                                <div class="col-4 custom-control custom-radio my-2">
                                    <input type="radio" id="customRadio2" name="status_hunian" value="penghuni"
                                        class="custom-control-input" @if ($rumah['status_hunian'] === 'penghuni') checked @endif>
                                    <label class="custom-control-label" for="customRadio2"
                                        style="font-size: 14px;">Penghuni</label>
                                </div>
                                <div class="col-5 custom-control custom-radio my-2">
                                    <input type="radio" id="customRadio3" name="status_hunian" value="pemilik/penghuni"
                                        class="custom-control-input" @if ($rumah['status_hunian'] === 'pemilik/penghuni') checked @endif>
                                    <label class="custom-control-label" for="customRadio3" style="font-size: 14px;">Pemilik
                                        & Penghuni</label>
                                </div>
                            </div>

                            <label for="status" class="col-form-label">Jabatan</label>
                            <div class="mb-2">
                                <select class="form-control" name="status" type="text" id="status">
                                    <option value="" selected disabled>Pilih Jabatan</option>
                                    <option @if ($rumah->user && $rumah->user['status'] === 'Kepala Desa') selected @endif value="Kepala Desa">Kepala
                                        Desa</option>
                                    <option @if ($rumah->user && $rumah->user['status'] === 'Sekertaris Desa') selected @endif value="Sekertaris Desa">
                                        Sekertaris Desa</option>
                                    <option @if ($rumah->user && $rumah->user['status'] === 'Bendahara') selected @endif value="Bendahara">Bendahara
                                    </option>
                                    <option @if ($rumah->user && $rumah->user['status'] === 'RW') selected @endif value="RW">RW</option>
                                    <option @if ($rumah->user && $rumah->user['status'] === 'RT') selected @endif value="RT">RT</option>
                                    <option @if ($rumah->user && $rumah->user['status'] === 'Warga') selected @endif value="Warga">Warga</option>
                                </select>
                            </div>
                            <a href="javascript:void(0);" class="text-success" data-toggle="modal"
                                data-target="#datadetailModal"><i>Data detail</i></a>
                        </div>
                        <button type="submit" class="btn btn-success px-3 float-right ">
                            Simpan
                        </button>
                        <button type="button" class="btn btn-danger px-4 float-right mr-2"
                            onclick="window.location.href='{{ route('wargaKomunitas.indexWarga', ['komunitas_id' => $getKomunitas['id']]) }}'">
                            Batal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.komunitasku.komunitas_warga.popup')
@endsection
