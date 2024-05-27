@extends('dashboard.layouts.main')
@section('title', 'Pengurus Komunitas')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Komunitasku</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('komunitas.index') }}">Komunitas</a>
                        </li>
                        <li class="breadcrumb-item active">Pengurus</li>
                    </ol>
                </div>
                <h4 class="page-title">Pengaturan Kepengurusan</h4>
            </div>
        </div>
        <div class="card-body">

            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 text-success">Pengaturan Level Kepengurusan</h4>
                    <button type="button" class="btn btn-primary btn-parent" data-toggle="modal">+
                        Tambah</button>
                    <hr>
                    <form method="POST" class="form-horizontal well" role="form">
                        <fieldset>
                            <div class="repeater-default">
                                <!-- Level 1 -->
                                <div class="row level-1">
                                    <div class="col-sm-1 border d-flex justify-content-center align-items-center mb-3 ml-3"
                                        style=" height: 50px;">
                                        Level 1
                                    </div>
                                    <div class="col-sm-3 border d-flex flex-column" style=" height: 50px;">
                                        <label class="control-label d-block" style="font-size: 11px;">Kepengurusan</label>
                                        <select name="car[0][make]" class="form-control bg-transparent shadow-none border-0"
                                            style="margin-top: -13px; margin-left: -16px">
                                            <option value="rw" selected="">[RW] Rukun Warga</option>
                                            <option value="rt">[RT] Rukun Tetangga]</option>
                                            <option value="sekretaris">Sekertaris</option>
                                            <option value="sekretaris">[Blok] Blok Perumahan</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 border d-flex flex-column" style=" height: 50px;">
                                        <label class="control-label d-block" style="font-size: 11px;">Deskripsi</label>
                                        <input type="text" name="car[0][model]" value="RW 03"
                                            class="form-control bg-transparent shadow-none border-0"
                                            style="margin-top: -13px; margin-left: -12px">
                                    </div>
                                    <div class="col-sm-5 border d-flex flex-column" style=" height: 50px;">
                                        <div class="row">
                                            <div class="col-8">
                                                <label class="control-label d-block" style="font-size: 11px;">Fungsi
                                                    Pengurus</label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox1"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="1">
                                                        <label class="custom-control-label" for="checkbox1">K</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox2"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="checkbox2">WK</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox3"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="3">
                                                        <label class="custom-control-label" for="checkbox3">S</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox4"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="4">
                                                        <label class="custom-control-label" for="checkbox4">B</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input" id="checkbox5"
                                                            data-parsley-multiple="groups" data-parsley-mincheck="5">
                                                        <label class="custom-control-label" for="checkbox5">P</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex align-items-center">
                                                <button type="button"
                                                    class="btn btn-primary px-3 py-0 btn-1">+Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Level 2 -->
                                <div class="row level-2">
                                    <div class="col-sm-1 border d-flex justify-content-center align-items-center mb-3 ml-5"
                                        style=" height: 50px;">
                                        Level 2
                                    </div>
                                    <div class="col-sm-3 border d-flex flex-column" style=" height: 50px;">
                                        <label class="control-label d-block" style="font-size: 11px;">Kepengurusan</label>
                                        <select name="car[0][make]"
                                            class="form-control bg-transparent shadow-none border-0"
                                            style="margin-top: -13px; margin-left: -16px">
                                            <option value="rw">[RW] Rukun Warga</option>
                                            <option value="rt" selected="">[RT] Rukun Tetangga</option>
                                            <option value="sekretaris">Sekertaris</option>
                                            <option value="sekretaris">[Blok] Blok Perumahan</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 border d-flex flex-column" style=" height: 50px;">
                                        <label class="control-label d-block" style="font-size: 11px;">Deskripsi</label>
                                        <input type="text" name="car[0][model]" value="RT 03"
                                            class="form-control bg-transparent shadow-none border-0"
                                            style="margin-top: -13px; margin-left: -12px">
                                    </div>
                                    <div class="col-sm-5 border d-flex flex-column" style=" height: 50px;">
                                        <div class="row">
                                            <div class="col-8">
                                                <label class="control-label d-block" style="font-size: 11px;">Fungsi
                                                    Pengurus</label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox1" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="1">
                                                        <label class="custom-control-label" for="checkbox1">K</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox2" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="checkbox2">WK</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox3" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="3">
                                                        <label class="custom-control-label" for="checkbox3">S</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox4" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="4">
                                                        <label class="custom-control-label" for="checkbox4">B</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox5" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="5">
                                                        <label class="custom-control-label" for="checkbox5">P</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex align-items-center">
                                                <button type="button"
                                                    class="btn btn-primary px-3 py-0 btn-2">+Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Level 3 -->
                                <div class="row level-3">
                                    <div class="col-sm-1 border d-flex justify-content-center align-items-center mb-3"
                                        style=" height: 50px; margin-left:75px">
                                        Level 3
                                    </div>
                                    <div class="col-sm-3 border d-flex flex-column" style=" height: 50px;">
                                        <label class="control-label d-block" style="font-size: 11px;">Kepengurusan</label>
                                        <select name="car[0][make]"
                                            class="form-control bg-transparent shadow-none border-0"
                                            style="margin-top: -13px; margin-left: -16px">
                                            <option value="rw">[RW] Rukun Warga</option>
                                            <option value="rt">[RT] Rukun Tetangga]</option>
                                            <option value="sekretaris">Sekertaris</option>
                                            <option value="sekretaris" selected="">[Blok] Blok Perumahan</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2 border d-flex flex-column" style=" height: 50px;">
                                        <label class="control-label d-block" style="font-size: 11px;">Deskripsi</label>
                                        <input type="text" name="car[0][model]" value="Blok Perumahan"
                                            class="form-control bg-transparent shadow-none border-0"
                                            style="margin-top: -13px; margin-left: -12px">
                                    </div>
                                    <div class="col-sm-5 border d-flex flex-column" style=" height: 50px;">
                                        <div class="row">
                                            <div class="col-8">
                                                <label class="control-label d-block" style="font-size: 11px;">Fungsi
                                                    Pengurus</label>
                                                <div class="d-flex justify-content-between">
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox1" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="1">
                                                        <label class="custom-control-label" for="checkbox1">K</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox2" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="2">
                                                        <label class="custom-control-label" for="checkbox2">WK</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox3" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="3">
                                                        <label class="custom-control-label" for="checkbox3">S</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox4" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="4">
                                                        <label class="custom-control-label" for="checkbox4">B</label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox mr-1">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox5" data-parsley-multiple="groups"
                                                            data-parsley-mincheck="5">
                                                        <label class="custom-control-label" for="checkbox5">P</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grup-level">

                                </div>
                                <div class="form-group mb-0 row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
