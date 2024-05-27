@extends('dashboard.layouts.main')
@section('title', 'Edit Data Rumah')
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
                        <li class="breadcrumb-item active">Edit data rumah</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Data Rumah</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="mb-3">
                        <div class="form-group">
                            <label for="rt" class="col-form-label">RT</label>
                            <div class="mb-2">
                                <input class="form-control" name="rt" type="text" id="rt" value="01">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rw" class="col-form-label">RW</label>
                            <div class="mb-2">
                                <input class="form-control" name="rw" type="text" id="rw" value="02">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jalan" class="col-form-label">Jalan</label>
                            <div class="mb-2">
                                <input class="form-control" name="jalan" type="text" id="jalan"
                                    value="Jl. satu dua">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="blok" class="col-form-label">Blok</label>
                            <div class="mb-2">
                                <input class="form-control" name="blok" type="text" id="blok" value="Blok satu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kode-rumah" class="col-form-label">Kode Rumah</label>
                            <div class="mb-2">
                                <input class="form-control" name="kode-rumah" type="kode-rumah" id="kode-rumah"
                                    value="12A">
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn btn-success px-3 float-right ">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-danger px-4 float-right mr-2">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
