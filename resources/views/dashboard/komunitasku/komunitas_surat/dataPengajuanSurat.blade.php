@extends('dashboard.layouts.main')
@section('title', 'Data Pengajuan Surat')
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
                        <li class="breadcrumb-item active">Pengaturan Surat</li>
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
                                            <span>
                                                <i class="dripicons-user"></i>
                                                <p class="d-inline-block">{{ $getKomunitas['jumlah_warga'] }}</p>
                                            </span>
                                            <span>
                                                <i class="dripicons-home"></i>
                                                <p class="d-inline-block">{{ $getKomunitas['jumlah_rumah'] }}</p>
                                            </span>
                                            <span>
                                                <i class="dripicons-location"></i>
                                                <p class="d-inline-block">{{ $getKomunitas['alamat_komunitas'] }}</p>
                                            </span>
                                            <span>
                                                <i class="mdi mdi-phone"></i>
                                                <p class="d-inline-block">{{ $getKomunitas['no_tlp'] }}</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-3 mb-3">Data Pengajuan Surat</h4>
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
                                    $nopengajuan = 1;
                                @endphp
                                @forelse ($suratPengajuan as $data)
                                    @if ($data->komunitas_id == $getKomunitas['id'])
                                        <tr>
                                            <td class="text-center">{{ $nopengajuan++ }}</td>
                                            {{-- <td>{{ $data->surat->jenis_surat }}</td> --}}
                                            <td>
                                                @if (!empty($data->surat->jenis_surat))
                                                    {{ $data->surat->jenis_surat }}
                                                @else
                                                    Jenis surat ke hapus
                                                @endif
                                            </td>
                                            <td>{{ $data->user->name }}</td>
                                            <td>
                                                @if (empty($data->status))
                                                    <span class="badge badge-boxed badge-warning">Proses</span>
                                                @elseif ($data->status === 'Proses')
                                                    <span class="badge badge-boxed badge-warning">Proses</span>
                                                @elseif ($data->status === 'Selesai')
                                                    <span class="badge badge-boxed badge-success">Selesai</span>
                                                @elseif ($data->status === 'Ditolak')
                                                    <span class="badge badge-boxed badge-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('detailpengajuan.detailPengajuan', ['komunitas_id' => $getKomunitas['id'], $data->id]) }}">
                                                    <i class="fa fa-eye mr-2 font-20"></i>
                                                </a>
                                                <a href="{{ Route('hapusPengajuan.destroyPengajuan', $data->id) }}">
                                                    <i class="fa fa-trash-o text-danger mr-2" style="font-size: 20px"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <p>Data Kosong</p>
                                @endforelse
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-danger px-4 float-right mt-4 mr-2"
                            onclick="window.location.href = '{{ route('surat.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
