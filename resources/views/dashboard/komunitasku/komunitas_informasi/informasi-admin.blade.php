@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Informasi')
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
                        <li class="breadcrumb-item active">Pengaturan Informasi</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-body bg-white">
                        <!-- Profil Komunitas Perumahan -->
                        <div class="card">
                            <div class="card-body"
                                style="background: linear-gradient(to top, {{ $getKomunitas['warna_skunder'] }}, {{ $getKomunitas['warna_primer'] }});">
                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . $getKomunitas['logo_komunitas']) }}" alt=""
                                            class="rounded-circle img-thumbnail thumb-xl">
                                        <div class="online-circle"></div>
                                    </div>
                                    <div class="col-7 text-center text-white">
                                        <h3>{{ $getKomunitas['nama_komunitas'] }}</h3>
                                        <p>"{{ $getKomunitas['moto_komunitas'] }}"</p>
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
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Informasi -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <h3 class="mt-0 d-inline-block">Daftar Informasi</h3>
                                    </div>
                                    <div class="col-2 text-right">
                                        <a href="{{ route('informasi.create', ['komunitas_id' => $getKomunitas['id']]) }}"
                                            class="btn btn-primary">+Tambah</a>
                                    </div>
                                </div>
                                <hr class="border">
                                <table id="tableWarga" class="table datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;" class="text-center">No</th>
                                            <th style="width: 200px;">Judul Informasi</th>
                                            <th>Descripsi singkat</th>
                                            <th>File Informasi</th>
                                            <th class="text-center" style="width: 125px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $noinfo = 1;
                                        @endphp
                                        @forelse($informasi as $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                                <tr>
                                                    <td>{{ $noinfo++ }}</td>
                                                    <td>{{ $data['judul_informasi'] }}</td>
                                                    <td>{{ Str::limit($data['deskripsi_singkat'], 150) }}</td>
                                                    <td>
                                                        @if ($data['file'])
                                                            <a href="{{ asset('storage/' . $data['file']) }}"
                                                                class="btn btn-sm btn-primary" download>Download</a>
                                                        @else
                                                            <p>tidak ada file</p>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('informasi.show', ['komunitas_id' => $getKomunitas['id'], $data['id']]) }}"
                                                            class="">
                                                            <i class="fa fa-eye text-danger mr-2"
                                                                style="font-size: 20px"></i>
                                                        </a>
                                                        <a href="{{ route('hapusInformasi.destroy', $data->id) }}">
                                                            <i class="fa fa-trash text-danger mr-2"
                                                                style="font-size: 20px"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <p>Data Informasi Kosong</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tabel Pengaduan -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <h3 class="mt-0 d-inline-block">Daftar Pengaduan</h3>
                                    </div>
                                </div>
                                <hr class="border">
                                <table id="tableWarga" class="table datatable">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;" class="text-center">No</th>
                                            <th style="width: 200px;">Judul Pengaduan</th>
                                            <th>Waktu Kejadian</th>
                                            <th>lokasi Kejadian</th>
                                            <th>Status Kejadian</th>
                                            <th class="text-center" style="width: 125px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $nopengaduan = 1;
                                        @endphp
                                        @forelse($pengaduan as $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                                <tr>
                                                    <td>{{ $nopengaduan++ }}</td>
                                                    <td>{{ $data->judul_pengaduan }}</td>
                                                    <td>{{ $data->waktu_kejadian }}</td>
                                                    <td>{{ $data->lokasi_kejadian }}</td>
                                                    <td>
                                                        <div>
                                                            @if ($data['status_pengaduan'] === 'Proses')
                                                                <span
                                                                    class="badge badge-boxed badge-warning">{{ $data['status_pengaduan'] }}</span>
                                                                <h6 class="text-dark ml-1"></h6>
                                                            @elseif ($data['status_pengaduan'] === 'Selesai')
                                                                <span
                                                                    class="badge badge-boxed badge-success">{{ $data['status_pengaduan'] }}</span>
                                                                <h6 class="text-dark ml-1"></h6>
                                                            @elseif ($data['status_pengaduan'] === 'Ditolak')
                                                                <span
                                                                    class="badge badge-boxed badge-danger">{{ $data['status_pengaduan'] }}</span>
                                                                <h6 class="text-dark ml-1"></h6>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('hapusPengaduan.destroy', $data->id) }}">
                                                            <i class="fa fa-trash text-danger mr-2"
                                                                style="font-size: 20px"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                            <p>Data Pengaduan Kosong</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                            onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">KEMBALI</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
