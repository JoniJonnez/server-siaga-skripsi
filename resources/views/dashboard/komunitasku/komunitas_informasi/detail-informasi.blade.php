@extends('dashboard.layouts.main')
@section('title', 'Detail Informasi')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Komunitasku</li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('komunitas.index') }}">Komunitas</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('informasi.index') }}">Pengaturan Informasi</a>
                            </li>
                            <li class="breadcrumb-item active">Detail Informasi</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Detail Informasi</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="media mb-3">
                        <img class="d-flex mr-3 rounded-circle thumb-md" src="{{ asset('assets/images/users/profil.png') }}"
                            alt="Generic placeholder image" />
                        <div class="media-body">
                            {{-- <h4 class="font-14 m-0">{{ $informasi->user->name }}</h4> --}}
                            <small class="text-muted">Ketua RT</small>
                        </div>
                    </div>

                    <h4 class="mt-4 mb-4 text-center">{{ $informasi->judul_informasi }}</h4>
                    <div>
                        <p>{!! $informasi->isi_informasi !!}</p>
                    </div>
                    <hr />
                    <h5>Dokumen Pendukung</h5>
                    <div class="row">
                        <div class="col-lg-2 col-md-4">
                            <div class="card">
                                <i class="fa fa-file-text-o fa-4x text-primary text-center"></i>
                                <div class="py-2 text-center">
                                    <a href="{{ asset('storage/' . $informasi->file) }}" class="text-muted font-600"
                                        download>Download</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                        onclick="window.history.go(-1);">KEMBALI</button>
                    {{-- <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                        onclick="window.location.href='{{ route('informasi.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
