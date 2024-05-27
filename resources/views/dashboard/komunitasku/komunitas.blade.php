@extends('dashboard.layouts.main')
@section('title', 'Komunitas')
@section('content')
    <style>
        .tab-pane {
            padding: 1rem;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .btn-buat-pengaduan {
            text-align: center;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent shadow-none">
                <div class="card-body bg-white">
                    <div class="card" style="background-image: url('{{ asset('assets/images/warrior.jpg') }}');">
                        <div class="card-body"
                        style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), {{ $getKomunitas->warna_skunder ?? '' }},{{ $getKomunitas->warna_primer ?? '' }}); margin-top: 15%;">
                            <div class="row">
                                <div class="col-3 d-flex justify-content-center align-items-center">
                                    <img src="{{ asset('storage/' . $getKomunitas->logo_komunitas) }}" alt=""
                                        class="rounded-circle img-thumbnail thumb-xl">
                                    <div class="online-circle"></div>
                                </div>
                                <div class="col-6 text-center text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.45);">
                                    <h3>{{ $getKomunitas->nama_komunitas }}</h3>
                                    <p>"{{ $getKomunitas->moto_komunitas }}"</p>
                                    <hr class="col-9" style="border-color:#fff">
                                    <div class="d-flex justify-content-around">
                                        <span class="w-20">
                                            <i class="dripicons-user"></i>
                                            <p class="d-inline-block">{{ $getKomunitas->jumlah_warga }}</p>
                                        </span>
                                        <span class="w-20">
                                            <i class="dripicons-home"></i>
                                            <p class="d-inline-block">{{ $getKomunitas->jumlah_rumah }}</p>
                                        </span>
                                        <span class="w-35">
                                            <i
                                                class="dripicons-location">{{ Str::limit($getKomunitas->alamat_komunitas, 30, '...') }}</i>
                                        </span>
                                        <span class="w-25">
                                            <i class="mdi mdi-phone"></i>
                                            <p class="d-inline-block">{{ $getKomunitas->no_tlp }}</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-3 text-right d-flex justify-content-end align-items-end">
                                    @if (Auth::user()->status != 'Warga')
                                        <button type="button" class="btn bg-secondary-light  mr-2" data-toggle="modal"
                                            data-target="#editprofilModal"><i class="mdi mdi-lead-pencil"></i></button>
                                        <button type="Update" class="btn bg-secondary-light" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"><i class=" dripicons-gear"></i>
                                        </button>
                                    @else
                                        @if ($statusPengurus == null)
                                        @else
                                            <button type="button" class="btn bg-secondary-light  mr-2" data-toggle="modal"
                                                data-target="#editprofilModal"><i class="mdi mdi-lead-pencil"></i></button>
                                            <button type="Update" class="btn bg-secondary-light" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i class=" dripicons-gear"></i>
                                            </button>
                                        @endif
                                    @endif

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('komunitas.halamanProfil', ['komunitas_id' => $getKomunitas['id']]) }}">Profil
                                            &
                                            Alamat</a>
                                        <a class="dropdown-item"
                                            href="{{ route('rumah.index', ['komunitas_id' => $getKomunitas['id']]) }}">Rumah</a>
                                        <a class="dropdown-item"
                                            href="{{ route('wargaKomunitas.indexWarga', ['komunitas_id' => $getKomunitas['id']]) }}">Warga</a>
                                        <a class="dropdown-item"
                                            href="{{ route('iuranKomunitas.index', ['komunitas_id' => $getKomunitas['id']]) }}">Iuran</a>
                                        <a class="dropdown-item"
                                            href="{{ route('keuangan.index', ['komunitas_id' => $getKomunitas['id']]) }}">Keuangan</a>
                                        <a class="dropdown-item"
                                            href="{{ route('surat.index', ['komunitas_id' => $getKomunitas['id']]) }}">Surat</a>
                                        <a class="dropdown-item"
                                            href="{{ route('informasi.index', ['komunitas_id' => $getKomunitas['id']]) }}">Informasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-toggle="tab" href="#role-1" role="tab">Profile</a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link " data-toggle="tab" href="#role-2" role="tab">Rumah</a>
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

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Panel Profil -->
                        <div class="tab-pane p-3 active isi" id="role-1" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-success">Profil Komunitas</h4>
                                    <hr class="border ">
                                    <div class="form-group">
                                        <label for="provinsi" class="col-form-label">Provinsi</label>
                                        <div class="mb-2">
                                            <input class="form-control" name="provinsi" type="text" id="provinsi"
                                                readonly value="{{ $getKomunitas->provinsi }}">
                                        </div>
                                        <label for="kabupaten" class="col-form-label">Kota/Kabupaten</label>
                                        <div class="mb-2">
                                            <input class="form-control" name="kabupaten" type="text" id="kabupaten"
                                                readonly value="{{ $getKomunitas->kabupaten }}">
                                        </div>
                                        <label for="kecamatan" class="col-form-label">Kecamatan</label>
                                        <div class="mb-2">
                                            <input class="form-control" name="kecamatan" type="text" id="kecamatan"
                                                readonly value="{{ $getKomunitas->kecamatan }}">
                                        </div>
                                        <label for="desa" class="col-form-label">Kelurahan/Desa</label>
                                        <div class="mb-2">
                                            <input class="form-control" name="desa" type="text" id="desa"
                                                readonly value="{{ $getKomunitas->desa }}">
                                        </div>
                                        <label for="kode_pos" class="col-form-label">Kode Pos</label>
                                        <div class="mb-2">
                                            <input class="form-control" name="kode_pos" type="text" id="kode_pos"
                                                readonly value="{{ $getKomunitas->kode_pos }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Panel Rumah -->
                        <div class="tab-pane p-3 rumah" id="role-2" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <i class="dripicons-view-list mr-2"></i>
                                        <h4 class="mt-4 d-inline-block">Daftar Rumah</h4>
                                    </div>
                                    <hr class="border">
                                    <table id="tableRumah" class="table">
                                        <thead>
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
                                            @php
                                                $indexrumah = 1;
                                            @endphp
                                            @foreach ($rumah as $datarumah)
                                                @if ($datarumah->komunitas_id == $getKomunitas['id'])
                                                    <tr>
                                                        <td>{{ $indexrumah++ }}</td>
                                                        <td>{{ $datarumah->rt }}</td>
                                                        <td>{{ $datarumah->rw }}</td>
                                                        <td>{{ $datarumah->jalan }}</td>
                                                        <td>{{ $datarumah->blok }}</td>
                                                        <td>{{ $datarumah->kode_rumah }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Panel Warga -->
                        <div class="tab-pane p-3" id="role-3" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <i class="dripicons-view-list mr-2"></i>
                                        <h4 class="mt-4 d-inline-block">Daftar Warga</h4>
                                    </div>
                                    <hr class="border">
                                    <table id="tableWarga" class="table datatable">
                                        <thead>
                                            <tr>
                                                <th>Kode Rumah</th>
                                                <th>Nama</th>
                                                <th class="text-center">Pemilik</th>
                                                <th class="text-center">Penghuni</th>
                                                <th>Jabatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rumah as $datarumah)
                                                @if ($datarumah->komunitas_id == $getKomunitas['id'])
                                                    <tr>
                                                        <td>{{ $datarumah->kode_rumah }}</td>
                                                        <td>
                                                            @if ($datarumah->user)
                                                                {{ $datarumah->user['name'] }}
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="radio my-2">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="radio2"
                                                                        @if ($datarumah['status_hunian'] == 'pemilik') checked @endif
                                                                        class="custom-control-input" />
                                                                    <label class="custom-control-label"></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="radio my-2">
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="radio1"
                                                                        @if ($datarumah['status_hunian'] == 'penghuni') checked @endif
                                                                        class="custom-control-input" />
                                                                    <label class="custom-control-label"></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($datarumah->user)
                                                                {{ $datarumah->user['status'] }}
                                                            @else
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Panel Iuran -->
                        <div class="tab-pane p-3" id="role-4" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <i class="dripicons-view-list mr-2"></i>
                                        <h4 class="mt-4 d-inline-block">Daftar Iuran</h4>
                                    </div>
                                    <hr class="border">
                                    <table id="tableIuran" class="table">
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
                                            @foreach ($iuran as $dataiuran)
                                                @if ($dataiuran->komunitas_id == $getKomunitas['id'])
                                                    @php
                                                        $isMatched = false;
                                                    @endphp
                                                    @php
                                                        $user_id = Auth::id();
                                                    @endphp
                                                    @foreach ($iuranPenggunas as $ir)
                                                        @if ($ir['iuran_id'] === $dataiuran['id'] && $ir['user_id'] === $user_id)
                                                            @php
                                                                $isMatched = true;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $dataiuran['created_at']->format('d F Y') }}</td>
                                                                <td>{{ $dataiuran['nama_iuran'] }}</td>
                                                                <td>Rp.{{ number_format($dataiuran['jumlah'], 0, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        $user_id = Auth::id();
                                                                    @endphp
                                                                    @if (empty($ir))
                                                                        <span class="badge badge-boxed badge-danger">Belum
                                                                            Lunas</span>
                                                                    @elseif ($ir['status_pembayaran'] === 'menunggu konfirmasi' && $ir['user_id'] === $user_id)
                                                                        <span
                                                                            class="badge badge-boxed badge-warning">Menunggu
                                                                            Konfirmasi</span>
                                                                    @elseif ($ir['status_pembayaran'] === 'lunas' && $ir['user_id'] === $user_id)
                                                                        <span
                                                                            class="badge badge-boxed badge-success">Lunas</span>
                                                                    @else
                                                                        <span class="badge badge-boxed badge-danger">Belum
                                                                            Lunas</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="#" data-toggle="modal"
                                                                        data-target="#detailiuranModal{{ $dataiuran->id }} ">
                                                                        <i class="fa fa-info-circle mr-2 font-20"></i>
                                                                    </a>
                                                                    <a
                                                                        href="{{ route('HalamanIuran.iuranKomunitas', ['komunitas_id' => $getKomunitas['id'], $dataiuran->id]) }}">
                                                                        <i class="fa  fa-navicon mr-2 font-20"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    @if (!$isMatched)
                                                        <tr>
                                                            <td>{{ $dataiuran['created_at']->format('d F Y') }}</td>
                                                            <td>{{ $dataiuran['nama_iuran'] }}</td>
                                                            <td>Rp.{{ number_format($dataiuran['jumlah'], 0, ',', '.') }}
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-boxed badge-danger">Belum
                                                                    Lunas</span>
                                                            </td>
                                                            <td>
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#detailiuranModal{{ $dataiuran->id }}">
                                                                    <i class="fa fa-info-circle mr-2 font-20"></i>
                                                                </a>
                                                                <a
                                                                    href="{{ route('HalamanIuran.iuranKomunitas', ['komunitas_id' => $getKomunitas['id'], $dataiuran->id]) }}">
                                                                    <i class="fa  fa-navicon mr-2 font-20"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endif

                                                <!-- Modal Iuran > Detail Iuran-->
                                                <div class="modal fade" id="detailiuranModal{{ $dataiuran->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="detailiuranModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg ml-auto modal-dialog-centered"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header d-flex justify-content-center">
                                                                <h4 class="modal-title text-success"
                                                                    id="exampleModalLongTitle">Detail Iuran</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama_iuran" class="col-form-label">Jenis
                                                                        Iuran</label>
                                                                    <div class="mb-2">
                                                                        <input class="form-control form-control-sm mb-2"
                                                                            name="nama_iuran" type="text" readonly
                                                                            id="nama_iuran"
                                                                            value="{{ $dataiuran->nama_iuran }}">
                                                                    </div>
                                                                    <label for="tanggal"
                                                                        class="col-form-label">Tanggal</label>
                                                                    <div class="mb-2">
                                                                        <input class="form-control form-control-sm mb-2"
                                                                            name="tanggal" type="text" readonly
                                                                            id="tanggal"
                                                                            value="{{ $dataiuran['created_at']->format('d F Y') }}">
                                                                    </div>
                                                                    <label for="jumlah-pembayaran"
                                                                        class="col-form-label">Jumlah
                                                                        Pembayaran</label>
                                                                    <div class="mb-2">
                                                                        <input class="form-control form-control-sm mb-2"
                                                                            name="jumlah-pembayaran" type="text"
                                                                            readonly id="jumlah-pembayaran"
                                                                            value="Rp.{{ number_format($dataiuran['jumlah'], 0, ',', '.') }}">
                                                                    </div>
                                                                    <label for="status-pembayaran"
                                                                        class="col-form-label">Status
                                                                        Pembayaran</label>
                                                                    <div class="mb-2">
                                                                        @php
                                                                            $user_id = Auth::id(); // Mendapatkan user id dari user yang sedang login
                                                                        @endphp
                                                                        @php
                                                                            $found_iuran_pengguna = false; // Tambahkan variabel ini untuk memeriksa apakah data iuran pengguna ditemukan
                                                                        @endphp
                                                                        @foreach ($iuranPengguna as $iP)
                                                                            @if ($iP->iuran_id === $dataiuran->id && $iP->user_id === $user_id)
                                                                                @php
                                                                                    $found_iuran_pengguna = true; // Ubah variabel menjadi true jika data iuran pengguna ditemukan
                                                                                @endphp
                                                                                @if ($iP->status_pembayaran == null)
                                                                                    <span
                                                                                        class="badge badge-boxed badge-danger">Belum
                                                                                        bayar</span>
                                                                                @elseif ($iP->status_pembayaran == 'lunas')
                                                                                    <span
                                                                                        class="badge badge-boxed badge-success">Lunas</span>
                                                                                @elseif ($iP->status_pembayaran == 'menunggu konfirmasi')
                                                                                    <span
                                                                                        class="badge badge-boxed badge-warning">Menunggu
                                                                                        Konfirmasi</span>
                                                                                @elseif ($iP->status_pembayaran == 'belum lunas')
                                                                                    <span
                                                                                        class="badge badge-boxed badge-danger">Belum
                                                                                        Lunas</span>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                        @if (!$found_iuran_pengguna)
                                                                            <span
                                                                                class="badge badge-boxed badge-danger">Belum
                                                                                Lunas</span>
                                                                        @endif
                                                                    </div>
                                                                    <h5 style="font-weight: bold;">Metode
                                                                        Pembayaran
                                                                    </h5>
                                                                    <div class="mb-2">
                                                                        <p class="mb-2" style="font-weight: bold;">
                                                                            1.&nbsp;M-Bankking</p>
                                                                        <p class="mb-2 ml-3">
                                                                            {{ $dataiuran->nama_bank }} =
                                                                            {{ $dataiuran->no_rekening }} -
                                                                            {{ $dataiuran->pemilik_rekening }}</p>
                                                                        <p class="mb-2" style="font-weight: bold;">
                                                                            2.&nbsp;E-Wallet</p>
                                                                        <p class="mb-2 ml-3">
                                                                            {{ $dataiuran->nama_wallet }}
                                                                            =
                                                                            {{ $dataiuran->no_wallet }} -
                                                                            {{ $dataiuran->pemilik_ewallet }}</p>
                                                                        <p><i><strong>Cash = </strong> datang
                                                                                Langsung
                                                                                Ke
                                                                                Pak RT atau bendahara perumahan</i>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <hr>
                                                                    <h4>Riwayat Status Pembayaran</h4>
                                                                    @php
                                                                        $user_id = Auth::id(); // Mendapatkan user id dari user yang sedang login
                                                                    @endphp

                                                                    @foreach ($iuranPenggunas as $ir)
                                                                        @if ($ir->iuran_id === $dataiuran->id && $ir->user_id === $user_id && $ir->status_pembayaran != 'belum lunas')
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <p class="mb-2"
                                                                                        style="font-weight: bold;">
                                                                                        -
                                                                                        &nbsp;Metode Pembayaran</p>
                                                                                    <p class="mb-2 ml-3">
                                                                                        {{ $ir->metode_pembayaran }}
                                                                                    </p>
                                                                                    <p class="mb-2"
                                                                                        style="font-weight: bold;">
                                                                                        -
                                                                                        &nbsp;Jumlah Pembayaran</p>
                                                                                    <p class="mb-2 ml-3">
                                                                                        Rp.{{ number_format($ir['jumlah'], 0, ',', '.') }}
                                                                                    </p>
                                                                                    <p class="mb-2"
                                                                                        style="font-weight: bold;">
                                                                                        -
                                                                                        &nbsp;Keterangan Pembayaran
                                                                                    </p>
                                                                                    <p class="mb-2 ml-3">
                                                                                        {{ $ir->keterangan }}</p>
                                                                                    <p class="mb-2"
                                                                                        style="font-weight: bold;">
                                                                                        -
                                                                                        &nbsp;Status Pembayaran</p>
                                                                                    <p class="mb-2 ml-3">
                                                                                        @if ($ir->status_pembayaran == 'lunas')
                                                                                            <span
                                                                                                class="badge badge-boxed badge-success">{{ $ir->status_pembayaran }}</span>
                                                                                        @elseif($ir->status_pembayaran == 'belum lunas')
                                                                                            <span
                                                                                                class="badge badge-boxed badge-danger">{{ $ir->status_pembayaran }}</span>
                                                                                        @elseif($ir->status_pembayaran == 'menunggu konfirmasi')
                                                                                            <span
                                                                                                class="badge badge-boxed badge-warning">{{ $ir->status_pembayaran }}</span>
                                                                                        @endif
                                                                                    </p>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <p class="mb-2"
                                                                                        style="font-weight: bold;">
                                                                                        -
                                                                                        &nbsp;Bukti Pembayaran</p>
                                                                                    <div>
                                                                                        <img src="{{ asset('storage/' . $ir->bukti_pembayaran) }}"
                                                                                            alt="Bukti Pembayaran"
                                                                                            width="150" height="150">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                                @php
                                                                    $user_id = Auth::id();
                                                                    $found_iuran_pengguna = false;
                                                                    foreach ($iuranPengguna as $iP) {
                                                                        if ($iP->iuran_id === $dataiuran->id && $iP->user_id === $user_id) {
                                                                            $found_iuran_pengguna = true;
                                                                            break;
                                                                        }
                                                                    }
                                                                @endphp

                                                                @if (!$found_iuran_pengguna || $iP->status_pembayaran === 'belum lunas')
                                                                    <button type="button"
                                                                        class="btn btn-success px-4 float-right"
                                                                        onclick="window.location.href = '{{ route('halamanBayarIuran.BayarIuran', ['komunitas_id' => $getKomunitas['id'], 'iuran_id' => $dataiuran->id]) }}';">
                                                                        Bayar
                                                                    </button>
                                                                @endif
                                                                <button type="button"
                                                                    class="btn btn-danger mr-2 px-4 float-right waves-effect"
                                                                    data-dismiss="modal">
                                                                    Batal
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Panel Keuangan -->
                    <div class="tab-pane test p-3" id="role-5" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h3 class="mt-0 d-inline-block">Data Permintaan Surat</h3>
                                    </div>
                                </div>
                                <hr class="border">
                                <table id="Keuangan" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>URAIAN</th>
                                            <th>PMASUKAN</th>
                                            <th>PENGEKURANAN</th>
                                            <th>SALDO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $iuranLunas = $iuranPengguna->where('status_pembayaran', 'lunas');
                                            $mergedData = $iuranLunas->merge($pengeluaran);
                                            $sortedData = $mergedData->sortByDesc('created_at');
                                            $reversedData = $sortedData->reverse();
                                            $index = 1;
                                            $totalPengeluaran = 0;
                                            $totalPemasukan = 0;
                                            $totalSaldo = 0;
                                        @endphp
                                        @foreach ($reversedData as $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                                <tr>
                                                    <td>{{ $index }}</td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            Pembayaran {{ $data->iuran->nama_iuran }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            <span class="text-danger">{{ $data->keterangan }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            {{ number_format($data['jumlah'], 0, ',', '.') }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            {{ $data->pemasukan }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            {{ $data->pengeluaran }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            <span
                                                                class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data instanceof \App\Models\IuranPengguna)
                                                            {{ number_format($data['jumlah'], 0, ',', '.') }}
                                                        @elseif ($data instanceof \App\Models\Pengeluaran)
                                                            <span
                                                                class="text-danger">{{ number_format($data['jumlah'], 0, ',', '.') }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @php
                                                    $index++;
                                                @endphp
                                                @php
                                                    // Menjumlahkan data pengeluaran dan pemasukan berdasarkan baris
                                                    if ($data instanceof \App\Models\Pengeluaran) {
                                                        $totalPengeluaran += $data->jumlah;
                                                    } elseif ($data instanceof \App\Models\IuranPengguna) {
                                                        $totalPemasukan += $data->jumlah;
                                                    }
                                                    // Menghitung saldo berdasarkan total pemasukan dan total pengeluaran
                                                    $totalSaldo = $totalPemasukan - $totalPengeluaran;
                                                @endphp
                                            @endif
                                        @endforeach
                                    <tfoot>
                                        <tr style="background-color: #E9ECEF">
                                            <td colspan="2"><strong>JUMLAH</strong></td>
                                            <td>{{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                                            <td>
                                                <span
                                                    class="text-danger">{{ number_format($totalPengeluaran, 0, ',', '.') }}</span>
                                            </td>
                                            <td>{{ number_format($totalSaldo, 0, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                </table>
                                <a href="{{ route('keuangancetakpdf.cetakpdf', ['komunitas_id' => $getKomunitas['id']]) }}"
                                    class="btn btn-primary" target="_blank">CETAK
                                    PDF</a>
                            </div>
                        </div>
                    </div>

                    <!-- Panel Surat -->
                    <div class="tab-pane p-3 surat" id="role-6" role="tabpanel">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h3 class="mt-0 d-inline-block">Permintaan Surat</h3>
                                    </div>
                                </div>
                                <div class="table">
                                    <h5>Jenis Surat :</h5>
                                    <select class="form-control" name="jenis_surat" id="pilih_jenis_surat">
                                        <option selected disabled> Pilih surat</option>
                                        @foreach ($surats as $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                                <option value="{{ $data->id }}">{{ $data->jenis_surat }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <h6>Data yang dibutuhkan</h6>
                                    <hr>
                                    <div class="row mb-4" id="checkboxContainer">
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-info px-4 float-right"
                                        onclick="window.location.href='{{ route('tambahsurat.addSurat', ['komunitas_id' => $getKomunitas['id']]) }}'">Buat</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h3 class="mt-0 d-inline-block">Data Permintaan Surat</h3>
                                    </div>
                                </div>
                                <hr class="border">
                                <table id="Coba" class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th>Jenis Surat</th>
                                            <th>Nama Pengirim</th>
                                            <th>Status Surat</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $indexsurat = 1;
                                        @endphp
                                        @forelse ($suratPengajuan as $SP)
                                            @if ($SP->user_id === auth()->id())
                                                <tr>
                                                    <td class="text-center">{{ $indexsurat++ }}</td>
                                                    <td>{{ $SP->surat->jenis_surat }}</td>
                                                    <td>{{ $SP->user->name }}</td>
                                                    <td>
                                                        @if (empty($SP->status))
                                                            <span class="badge badge-boxed badge-warning">Proses</span>
                                                        @elseif ($SP->status === 'Proses')
                                                            <span class="badge badge-boxed badge-warning">Proses</span>
                                                        @elseif ($SP->status === 'Selesai')
                                                            <span
                                                                class="badge badge-boxed badge-success">Selesai</span>
                                                        @elseif ($SP->status === 'Ditolak')
                                                            <span class="badge badge-boxed badge-danger">Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a
                                                            href="{{ route('detailsurat.detailSurat', ['komunitas_id' => $getKomunitas['id'], $SP->id]) }}">
                                                            <i class="fa fa-eye mr-2 font-20"></i>
                                                        </a>
                                                        <a
                                                            href="{{ Route('hapusPengajuan.destroyPengajuan', $SP->id) }}">
                                                            <i class="fa fa-trash-o text-danger mr-2"
                                                                style="font-size: 20px"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <tr>
                                                <td colspan="5">Data Kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Panel Informasi -->
                    <div class="tab-pane p-3" id="role-7" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="btn-container">
                                    <div class="text-left ml-2">
                                        <h3 class="mt-0 d-inline-block">Informasi</h3>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{ route('pengaduan.index', ['komunitas_id' => $getKomunitas['id']]) }}"
                                            class="btn btn-info btn-buat-pengaduan">Buat pengaduan</a>
                                    </div>
                                </div>
                                <hr class="border">
                                <div class="row">
                                    @foreach ($informasi as $dataInfo)
                                        @if ($dataInfo->komunitas_id == $getKomunitas['id'])
                                            <div class="col-lg-4">
                                                <div class="card card-body">
                                                    <h4 class="card-title mt-0">{{ $dataInfo->judul_informasi }}</h4>
                                                    <p class="card-text text-muted font-13">
                                                        {{ Str::limit($dataInfo->deskripsi_singkat, 150) }}
                                                    </p>
                                                    <a href="{{ route('informasi.show', ['komunitas_id' => $getKomunitas['id'], $dataInfo['id']]) }}"
                                                        class="btn btn-primary">Selengkapnya</a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
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

@include('dashboard.komunitasku.popup')
@endsection
