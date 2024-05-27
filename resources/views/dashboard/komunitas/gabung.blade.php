@extends('dashboard.layouts.main')
@section('title', 'Detail Komunitas')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="card-body ">
            <div class="card bg-transparent shadow-none">
                <div class="card-body "
                    style="background: linear-gradient(to top, {{ $getKomunitas->warna_skunder }},{{ $getKomunitas->warna_primer }}">
                    <div class="row">
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/' . $getKomunitas['logo_komunitas']) }}" alt=""
                                class="rounded-circle img-thumbnail thumb-xl">
                        </div>
                        <div class="col-9 text-center text-white">
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
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <p>{{ $getKomunitas->deskripsi_komunitas }}</p>
                        <button type="Update" class="btn btn-success px-4 float-right mt-2"
                            onclick="window.location.href = '{{ route('pengajuanKomunitas.pengajuanKomunitas', $getKomunitas->id) }}'">Gabung</button>
                    </div>
                </div>
                <div class="text-right mr-4 m-2">
                    <button type="button" class="btn btn-danger btn-sm col-1"
                        onclick="window.location.href = '{{ route('cariKomunitas.cari') }}'">Kembali</button>
                </div>
            </div>
        </div>
    </div>
@endsection
