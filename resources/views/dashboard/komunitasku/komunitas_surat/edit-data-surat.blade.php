@extends('dashboard.layouts.main')
@section('title', 'Edit Data Jenis Surat')
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
                        <li class="breadcrumb-item active">Edit data data Surat</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Data Jenis Surat</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="kode-rumah" class="col-form-label">Jenis Surat</label>
                        <div class="">
                            <input class="form-control" name="kode-rumah" type="text" id="kode-rumah"
                                value="Surat Keterangan Domisili">
                        </div>
                    </div>
                    <p>Data yang dibutuhkan</p>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox1"
                                    data-parsley-multiple="groups" data-parsley-mincheck="1">
                                <label class="custom-control-label" for="checkbox1">Nama
                                    Lengkap</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox2"
                                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                                <label class="custom-control-label" for="checkbox2">Jenis
                                    Surat</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox3"
                                    data-parsley-multiple="groups" data-parsley-mincheck="3">
                                <label class="custom-control-label" for="checkbox3">Tempat/Tanggal
                                    lahir</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox4"
                                    data-parsley-multiple="groups" data-parsley-mincheck="4">
                                <label class="custom-control-label" for="checkbox4">Pekerjaan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox5"
                                    data-parsley-multiple="groups" data-parsley-mincheck="5">
                                <label class="custom-control-label" for="checkbox5">Agama</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox6"
                                    data-parsley-multiple="groups" data-parsley-mincheck="6">
                                <label class="custom-control-label" for="checkbox6">Status
                                    Perkawinan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox7"
                                    data-parsley-multiple="groups" data-parsley-mincheck="7">
                                <label class="custom-control-label" for="checkbox7">Kewarganegaraan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox8"
                                    data-parsley-multiple="groups" data-parsley-mincheck="8">
                                <label class="custom-control-label" for="checkbox8">Nomor
                                    NIK/Passpor</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox9"
                                    data-parsley-multiple="groups" data-parsley-mincheck="9">
                                <label class="custom-control-label" for="checkbox9">Nomor
                                    Kartu Keluarga</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox10"
                                    data-parsley-multiple="groups" data-parsley-mincheck="10">
                                <label class="custom-control-label" for="checkbox10">Alamat
                                    Sesuai
                                    KTP</label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox11"
                                    data-parsley-multiple="groups" data-parsley-mincheck="11">
                                <label class="custom-control-label" for="checkbox11">Alamat
                                    Domisili</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox12"
                                    data-parsley-multiple="groups" data-parsley-mincheck="12">
                                <label class="custom-control-label" for="checkbox12">Keperluan</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success px-4 float-right">SIMPAN</button>
                    <button type="Update" class="btn btn-danger px-4 float-right mr-3"
                        onclick="window.history.go(-1);">BATAL</button>
                </div>
            </div>
        </div>
    </div>
@endsection
