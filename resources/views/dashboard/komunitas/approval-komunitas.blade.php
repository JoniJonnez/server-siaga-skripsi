@extends('dashboard.layouts.main')
@section('title', 'Approval Komunitas')
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
                        <li class="breadcrumb-item">
                            <a href="{{ route('wargaKomunitas.indexWarga') }}">Pengaturan Warga</a>
                        </li>
                        <li class="breadcrumb-item active">Approval Komunitas</li>
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

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group col-6">
                                    <i class="dripicons-view-list mr-2"></i>
                                    <h4 class="mt-4 d-inline-block">Daftar pengajuan bergabung</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="">
                                        <table class="table table-hover mb-0" style="width: 100%">
                                            <thead class="thead-default">
                                                <tr>
                                                    <th class="text-center">Kode Rumah</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th class="text-center">Pemilik</th>
                                                    <th class="text-center">Penghuni</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($rumah as $data)
                                                    @if ($data->status_komunitas === null || $data->status_komunitas === 'menunggu')
                                                        <tr>
                                                            <td class="text-center">{{ $data['kode_rumah'] }}</td>
                                                            <td>{{ $data->user->name }}</td>
                                                            <td>{{ $data->user->alamat }}</td>
                                                            <td class="text-center">
                                                                <div class="radio my-2">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="radio2"
                                                                            @if ($data['status_hunian'] == 'pemilik') checked @endif
                                                                            class="custom-control-input" />
                                                                        <label class="custom-control-label"></label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="radio my-2">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="radio1"
                                                                            @if ($data['status_hunian'] == 'penghuni') checked @endif
                                                                            class="custom-control-input" />
                                                                        <label class="custom-control-label"></label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="d-flex justify-content-center">
                                                                <a href="{{ route('Approval.show', ['komunitas_id' => $getKomunitas['id'], $data->id]) }}"
                                                                    class="btn btn-sm btn-success mr-2"><i
                                                                        class="fa fa-eye"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">Data pengajuan kosong</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                            onclick="window.location.href = '{{ route('wargaKomunitas.indexWarga', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
