{{-- @extends('dashboard.layouts.main')
@section('title', 'Komunitas')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent shadow-none">
                <div class="card-body bg-white">
                    <div class="card">
                        <div class="card-body" style="background: linear-gradient(to top, #08CAA2,#058BA0);">
                            <div class="row">
                                <div class="col-3 d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('assets/images/users/user-3.jpg') }}" alt=""
                                        class="rounded-circle img-thumbnail thumb-xl">
                                    <div class="online-circle"></div>
                                </div>
                                <div class="col-6 text-center text-white">
                                    <h3>Komunitas Perumahan Wakanda</h3>
                                    <p>"Bersama-sama mari hidup rukun bertetangga"</p>
                                    <hr class="col-9" style="border-color:#fff">
                                    <div class="d-flex justify-content-around">
                                        <span>
                                            <i class="dripicons-user"></i>
                                            <p class="d-inline-block">34</p>
                                        </span>
                                        <span>
                                            <i class="dripicons-home"></i>
                                            <p class="d-inline-block">18</p>
                                        </span>
                                        <span>
                                            <i class="dripicons-location"></i>
                                            <p class="d-inline-block">Jln. Indramayu Kota</p>
                                        </span>
                                        <span>
                                            <i class="mdi mdi-phone"></i>
                                            <p class="d-inline-block">089765432812</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-3 text-right d-flex justify-content-end align-items-end">
                                    <button type="button" class="btn bg-secondary-light  mr-2" data-toggle="modal"
                                        data-target="#editprofilModal"><i class="mdi mdi-lead-pencil"></i></button>
                                    <button type="Update" class="btn bg-secondary-light" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false"><i class=" dripicons-gear"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item profil-alamat" href="javascript:void(0);"
                                            data-toggle="modal">Profil
                                            & Alamat</a>
                                        <a class="dropdown-item rumah" href="javascript:void(0);"
                                            data-toggle="modal">Rumah</a>
                                        <a class="dropdown-item warga" href="javascript:void(0);"
                                            data-toggle="modal">Warga</a>
                                        <a class="dropdown-item iuran" href="javascript:void(0);"
                                            data-toggle="modal">Iuran</a>
                                        <a class="dropdown-item" href="{{ route('pengurus.index') }}">Pengurus</a>
                                        <a class="dropdown-item keuangan" href="javascript:void(0);"
                                            data-toggle="dropdown">Keuangan</a>
                                        <a class="dropdown-item surat" href="javascript:void(0);"
                                            data-toggle="modal">Surat</a>
                                        <a class="dropdown-item"
                                            href="{{ route('pengaturan-komunitas.index') }}">Pengaturan</a>
                                        <a class="dropdown-item informasi" href="javascript:void(0);"
                                            data-toggle="modal">Informasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive bg-white">
                        <div class="card bg-transparent shadow-none">
                            <div class="card-body ">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link  active" data-toggle="tab" href="#role-1"
                                            role="tab">Profil</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#role-2" role="tab">Rumah</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#role-3" role="tab">Warga</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#role-4" role="tab">Iuran</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#role-5" role="tab">Keuangan</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#role-6" role="tab">Surat</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#role-7" role="tab">Informasi</a>
                                    </li>
                                </ul>

                                <!-- Tab panel -->
                                <div class="tab-content">
                                    <!-- Tab panel Profil-->
                                    <div class="tab-pane p-3 active isi" id="role-1" role="tabpanel">
                                        <h4>Profil Komunitas</h4>
                                        <hr class="border">
                                        <div class="form-group col-12">
                                            <label for="provinsi" class="col-form-label">Provinsi</label>
                                            <div class="mb-2">
                                                <input class="form-control" name="provinsi" type="text"
                                                    id="provinsi" readonly value="DKI Jakarta">
                                            </div>

                                            <label for="kota/kabupaten" class="col-form-label">Kota/Kabupaten</label>
                                            <div class="mb-2">
                                                <input class="form-control" name="kota/kabupaten" type="text"
                                                    id="kota/kabupaten" readonly value="Jakarta Barat">
                                            </div>

                                            <label for="kecamatan" class="col-form-label">Kecamatan</label>
                                            <div class="mb-2">
                                                <input class="form-control" name="kecamatan" type="text"
                                                    id="kecamatan" readonly value="Palmerah">
                                            </div>

                                            <label for="kelurahan/desa" class="col-form-label">Kelurahan/Desa</label>
                                            <div class="mb-2">
                                                <input class="form-control" name="kelurahan/desa" type="text"
                                                    id="kelurahan/desa" readonly value="Wakanda">
                                            </div>

                                            <label for="kode-pos" class="col-form-label">Kode Pos</label>
                                            <div class="mb-2">
                                                <input class="form-control" name="kode-pos" type="text"
                                                    id="kode-pos" readonly value="12345">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab panel Rumah-->
                                    <div class="tab-pane p-3 isi-rumah" id="role-2" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-group">
                                                        <i class="dripicons-view-list mr-2"></i>
                                                        <h4 class="mt-0 d-inline-block">Daftar RT, RW, Jalan, Blok</h4>
                                                    </div>
                                                    <div class="">
                                                        <div class="input-group">
                                                            <input type="cari" id="example-input2-group3"
                                                                name="example-input2-group3" class="form-control"
                                                                placeholder="Cari">
                                                            <div class="input-group-append">
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="mdi mdi-filter"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <button class="dropdown-item"
                                                                        type="button">RT</button>
                                                                    <button class="dropdown-item"
                                                                        type="button">RW</button>
                                                                    <button class="dropdown-item"
                                                                        type="button">Jalan</button>
                                                                    <button class="dropdown-item"
                                                                        type="button">Blok</button>
                                                                    <button class="dropdown-item" type="button">Kode
                                                                        Rumah</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead class="thead-default">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>RT</th>
                                                                <th>RW</th>
                                                                <th>Jalan</th>
                                                                <th>Blok</th>
                                                                <th>Kode Rumah</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>01</td>
                                                                <td>02</td>
                                                                <td>Jl. satu dua</td>
                                                                <td>Blok satu</td>
                                                                <td>12A</td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>02</td>
                                                                <td>03</td>
                                                                <td>Jl. dua tiga</td>
                                                                <td>Blok dua</td>
                                                                <td>23A</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab panel warga-->
                                    <div class="tab-pane p-3 isi-warga" id="role-3" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-group">
                                                        <i class="dripicons-view-list mr-2"></i>
                                                        <h4 class="mt-0 d-inline-block">Daftar Warga</h4>
                                                    </div>
                                                    <div class="">
                                                        <div class="input-group">
                                                            <input type="cari" id="example-input2-group3"
                                                                name="example-input2-group3" class="form-control"
                                                                placeholder="Cari">
                                                            <div class="input-group-append">
                                                                <button type="button"
                                                                    class="btn btn-primary dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="mdi mdi-filter"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <button class="dropdown-item" type="button">Kode
                                                                        rumah</button>
                                                                    <button class="dropdown-item"
                                                                        type="button">Pemilik</button>
                                                                    <button class="dropdown-item"
                                                                        type="button">Penghuni</button>
                                                                    <button class="dropdown-item"
                                                                        type="button">Jabatan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead class="thead-default">
                                                            <tr>
                                                                <th>Kode Rumah</th>
                                                                <th>Nama</th>
                                                                <th>Pemilik</th>
                                                                <th>Penghuni</th>
                                                                <th>Jabatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>12A</td>
                                                                <td>Bambang</td>
                                                                <td>
                                                                    <div class="radio my-2">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="radio1"
                                                                                name="radion1"
                                                                                class="custom-control-input"
                                                                                checked="checked" />
                                                                            <label class="custom-control-label"></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="radio my-2">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="radio1"
                                                                                name="radion1"
                                                                                class="custom-control-input" />
                                                                            <label class="custom-control-label"></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>Warga</td>
                                                            </tr>
                                                            <tr>
                                                                <td>23A</td>
                                                                <td>Gunawan</td>
                                                                <td>
                                                                    <div class="radio my-2">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="radio5"
                                                                                name="radioDisabled"
                                                                                class="custom-control-input"
                                                                                disabled="" />
                                                                            <label class="custom-control-label"></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="radio my-2">
                                                                        <div class="custom-control custom-radio">
                                                                            <input type="radio" id="radio6"
                                                                                name="radioDisabled" checked="checked"
                                                                                class="custom-control-input" />
                                                                            <label class="custom-control-label"></label>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>Ketua RT</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <br>

                                        <!-- Undang Bergabung komunitas -->
                                        <div class="row">
                                            <div class="col-5">
                                                <h4 class="text-center">Undang Member Komunitas</h4>
                                                <p class="text-center">Undang anggota kedalam komunitas dengan <br>
                                                    menggunakan
                                                    link/e-mail di bawah ini</p>
                                                <div class="">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fa fa-envelope"></i></span>
                                                        </div>
                                                        <input type="email" id="example-input2-group1"
                                                            name="example-input2-group1" class="form-control"
                                                            placeholder="jbaKSasxsxjncaa" />
                                                    </div>
                                                    <div class="d-flex justify-content-center">
                                                        <button type="input" class="btn btn-danger px-4"><i
                                                                class="mdi mdi-email-open"></i>
                                                            Email</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <h5 class="text-center">Atau</h5>
                                            </div>
                                            <div class="col-5">
                                                <p class="text-center">Undang anggota keluargamu dengan <br> QR dibawah
                                                    ini
                                                </p>
                                                <img src="{{ asset('image/qrcode.jpeg') }}" alt=""
                                                    class="mx-auto d-block">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab panel iuran-->
                                    <div class="tab-pane p-3 isi-iuran" id="role-4" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="form-group">
                                                        <i class="dripicons-view-list mr-2"></i>
                                                        <h4 class="mt-0 d-inline-block">Daftar Iuran</h4>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- tabel konfirmasi iuran-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table id="datatable" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Tanggal</th>
                                                                        <th>Jenis Iuran</th>
                                                                        <th>Jumlah Bayaran</th>
                                                                        <th>Status Pembayaran</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1-06-2023</td>
                                                                        <td>Iuran Awal</td>
                                                                        <td>Rp.500.000</td>
                                                                        <td>
                                                                            <span
                                                                                class="badge badge-boxed badge-info">Belum
                                                                                bayar</span>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" data-toggle="modal"
                                                                                data-target="#detailiuranModal">
                                                                                <i
                                                                                    class="fa fa-info-circle mr-2 font-20"></i>
                                                                            </a>
                                                                            <a href="#">
                                                                                <i class="fa fa-eye mr-2 font-20"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1-06-2023</td>
                                                                        <td>Iuran Awal</td>
                                                                        <td>Rp.500.000</td>
                                                                        <td>
                                                                            <span
                                                                                class="badge badge-boxed badge-warning">Menunggu
                                                                                konfirmasi</span>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" data-toggle="modal"
                                                                                data-target="#detailiuranModal">
                                                                                <i
                                                                                    class="fa fa-info-circle mr-2 font-20"></i>
                                                                            </a>
                                                                            <a href="#">
                                                                                <i class="fa fa-eye mr-2 font-20"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>1-06-2023</td>
                                                                        <td>Iuran Awal</td>
                                                                        <td>Rp.500.000</td>
                                                                        <td>
                                                                            <span
                                                                                class="badge badge-boxed badge-success">Lunas</span>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#" data-toggle="modal"
                                                                                data-target="#detailiuranModal">
                                                                                <i
                                                                                    class="fa fa-info-circle mr-2 font-20"></i>
                                                                            </a>
                                                                            <a href="#">
                                                                                <i class="fa fa-eye mr-2 font-20"></i>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab panel keuangan-->
                                    <div class="tab-pane p-3 isi-keuangan" id="role-5" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="justify-content-between">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <h4 class="mt-0 d-inline-block">Input Laporan Keuangan</h4>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="d-flex justify-content-end px-3 py-3 mb-0">
                                                                <i class="mdi mdi-calendar-today mr-2"
                                                                    style="font-size: 30px"></i>
                                                                <select class="form-control w-25 mr-2">
                                                                    <option>Tahun</option>
                                                                    <option>Tahun 1</option>
                                                                    <option>Tahun 2</option>
                                                                </select>
                                                                <div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- tabel saldo awal kas dan bank -->
                                                <div class="table-responsive">
                                                    <table id="table"
                                                        class="table table-hover table-bordered table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 210px">Saldo Awal Kas & Bank</th>
                                                                <th>Jan</th>
                                                                <th>Feb</th>
                                                                <th>Mar</th>
                                                                <th>Apr</th>
                                                                <th>Mei</th>
                                                                <th>Jun</th>
                                                                <th>Jul</th>
                                                                <th>Agt</th>
                                                                <th>Sep</th>
                                                                <th>Okt</th>
                                                                <th>Nov</th>
                                                                <th>Des</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- baris 1 -->
                                                            <tr>
                                                                <td>101 Bank BCA</td>
                                                                <td>200000</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <!-- baris 2 -->
                                                            <tr>
                                                                <td>Total Saldo Awal Kas & Bank</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- tabel Pemasukan -->
                                                <div class="table-responsive">
                                                    <table id="table"
                                                        class="table table-hover table-bordered table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 210px">Pemasukan</th>
                                                                <th>Jan</th>
                                                                <th>Feb</th>
                                                                <th>Mar</th>
                                                                <th>Apr</th>
                                                                <th>Mei</th>
                                                                <th>Jun</th>
                                                                <th>Jul</th>
                                                                <th>Agt</th>
                                                                <th>Sep</th>
                                                                <th>Okt</th>
                                                                <th>Nov</th>
                                                                <th>Des</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- baris 1 -->
                                                            <tr>
                                                                <td>Iuran Wajib</td>
                                                                <td>200000</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <!-- baris 2 -->
                                                            <tr>
                                                                <td>Total Pemasukan</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- tabel Pengeluaran -->
                                                <div class="table-responsive">
                                                    <table id="table"
                                                        class="table table-hover table-bordered table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 210px">Pengeluaran</th>
                                                                <th>Jan</th>
                                                                <th>Feb</th>
                                                                <th>Mar</th>
                                                                <th>Apr</th>
                                                                <th>Mei</th>
                                                                <th>Jun</th>
                                                                <th>Jul</th>
                                                                <th>Agt</th>
                                                                <th>Sep</th>
                                                                <th>Okt</th>
                                                                <th>Nov</th>
                                                                <th>Des</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- baris 1 -->
                                                            <tr>
                                                                <td>Biaya Operasional</td>
                                                                <td>200000</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <!-- baris 2 -->
                                                            <tr>
                                                                <td>Total Total Pengeluaran</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab panel surat-->
                                    <div class="tab-pane p-3 isi-surat" id="role-6" role="tabpanel">
                                        <div class="card ">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="">
                                                        <h3 class="mt-0 d-inline-block">Permintaan Surat</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="table">
                                                    <h5>Jenis Surat :</h5>
                                                    <select class="form-control">
                                                        <option>Jenis Surat</option>
                                                        <option>Surat Keterangan Domisili</option>
                                                        <option>Surat 2</option>
                                                        <option>Surat 3</option>
                                                    </select>
                                                    <h6>Data yang di butuhkan</h6>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox1" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="1">
                                                                <label class="custom-control-label" for="checkbox1">Nama
                                                                    Lengkap</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox2" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="checkbox2">Jenis
                                                                    Surat</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox3" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="3">
                                                                <label class="custom-control-label"
                                                                    for="checkbox3">Tempat/Tanggal
                                                                    lahir</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox4" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="4">
                                                                <label class="custom-control-label"
                                                                    for="checkbox4">Pekerjaan</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox5" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="5">
                                                                <label class="custom-control-label"
                                                                    for="checkbox5">Agama</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox6" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="6">
                                                                <label class="custom-control-label" for="checkbox6">Status
                                                                    Perkawinan</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox7" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="7">
                                                                <label class="custom-control-label"
                                                                    for="checkbox7">Kewarganegaraan</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox8" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="8">
                                                                <label class="custom-control-label" for="checkbox8">Nomor
                                                                    NIK/Passpor</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox9" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="9">
                                                                <label class="custom-control-label" for="checkbox9">Nomor
                                                                    Kartu Keluarga</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox10" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="10">
                                                                <label class="custom-control-label"
                                                                    for="checkbox10">Alamat
                                                                    Sesuai
                                                                    KTP</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox11" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="11">
                                                                <label class="custom-control-label"
                                                                    for="checkbox11">Alamat
                                                                    Domisili</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="checkbox12" data-parsley-multiple="groups"
                                                                    data-parsley-mincheck="12">
                                                                <label class="custom-control-label"
                                                                    for="checkbox12">Keperluan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <button type="submit" class="btn btn-info px-4 float-right"
                                                    onclick="window.location.href = '{{ route('buat-surat.index') }}';">Buat</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tab Panel Informasi-->
                                    <div class="tab-pane p-3 isi-informasi" id="role-7" role="tabpanel">
                                        <div class="card bg-transparent shadow-none">
                                            <div class="card-body">
                                                <div class="mb-4">
                                                    <div class="row">
                                                        <div class="col-10">
                                                            <h3 class="mt-0 d-inline-block">Informasi</h3>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="card card-body">
                                                            <h4 class="card-title mt-0">kebijakan baru di perumahan
                                                                wakanda
                                                            </h4>
                                                            <p class="card-text text-muted font-13">
                                                                With supporting text below as a natural lead-in to
                                                                additional
                                                                content.
                                                            </p>
                                                            <a href="{{ route('detail-informasi.index') }}"
                                                                class="btn btn-primary">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card card-body">
                                                            <h4 class="card-title mt-0">Undangan Rapat Masyarakat
                                                                Wakanda
                                                            </h4>
                                                            <p class="card-text text-muted font-13">
                                                                With supporting text below as a natural lead-in to
                                                                additional
                                                                content.
                                                            </p>
                                                            <a href="{{ route('detail-informasi.index') }}"
                                                                class="btn btn-primary">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="card card-body">
                                                            <h4 class="card-title mt-0">Pengumuman kerja bakti
                                                            </h4>
                                                            <p class="card-text text-muted font-13">
                                                                With supporting text below as a natural lead-in to
                                                                additional
                                                                content.
                                                            </p>
                                                            <a href="{{ route('detail-informasi.index') }}"
                                                                class="btn btn-primary">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .dropdown-menu li {
            position: relative;
        }

        .dropdown-menu .dropdown-submenu {
            display: none;
            position: absolute;
            left: 100%;
            top: -7px;
        }

        .dropdown-menu .dropdown-submenu-left {
            right: 100%;
            left: auto;
        }

        .dropdown-menu>li:hover>.dropdown-submenu {
            display: block;
        }
    </style>
    {{-- Kumpulan Modals --}}
{{-- @include('dashboard.komunitasku.popup')
@endsection --}}
