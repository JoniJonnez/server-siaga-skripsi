@extends('dashboard.layouts.main')
@section('title', 'Dashboard')
@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title" >
                    <img src="{{ asset('assets/images/Dashboard.svg') }}">
                    Beranda
                </h4>
            </div>
        </div>
    </div>
    <!-- end page title end breadcrumb -->
    <div class="row">
        <div class="col">
            <div class="card bg-warning text-white h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-content-center" style="margin-top:-20px; margin-left:-15px;">
                        <h4 class="card-title mt-2 mr-2">
                            <img src="{{ asset('assets/images/titik.png') }}" width="27">
                            Iuran Lunas
                        </h4>
                    </div>
                    <p class="text-start font-13">Atur iuran mu dengan menggunakan fitur ini</p>
                    <h4 class="float-right" style="margin-bottom:-15px">
                        @if ($iuranPenggunas->isNotEmpty())
                            @if ($iuranPenggunas->count() === 1)
                                Rp. {{ number_format($iuranPenggunas->first()->jumlah, 0, ',', '.') }}
                            @else
                                Rp.
                                {{ number_format($iuranPenggunas->where('status_pembayaran', 'lunas')->sum('jumlah'), 0, ',', '.') }}
                            @endif
                        @else
                            0
                        @endif
                    </h4>
                </div>
                <img class="card-img-top img-fluid" height="130" src="{{ asset('assets/images/uang.jpg') }}" alt="Iuran image">
            </div>
        </div>

        <div class="col">
            <div class="card bg-danger text-white h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-content-center" style="margin-top:-20px; margin-left:-15px;">
                        <h4 class="card-title mt-2 mr-2">
                            <img src="{{ asset('assets/images/titik.png') }}" width="27">
                            Iuran Belum Lunas
                        </h4>
                    </div>
                    <p class="text-start font-13">Informasi mengenai total iuran yang belum lunas</p>
                    <h4 class="float-right" style="margin-bottom:-15px">
                        Rp.{{ number_format($totalIuranBelumLunas, 0, ',', '.') }}
                    </h4>
                </div>
                <img class="card-img-top img-fluid" height="130" src="{{ asset('assets/images/dollar.jpg') }}" alt="Iuran image">
            </div>
        </div>

        <div class="col">
            <div class="card bg-info text-white h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-content-center" style="margin-top:-20px; margin-left:-15px;">
                        <h4 class="card-title mt-2 mr-2">
                            <img src="{{ asset('assets/images/titik.png') }}" width="27">
                            Komunitas
                        </h4>
                    </div>
                    <p class="card-text font-13">Informasi mengenai komunitas yang telah bergabung</p>
                    <h4 class="float-right" style="margin-bottom: -15px">
                        {{ $rumahs->unique('komunitas_id')->count() }}
                    </h4>
                </div>
                <img class="card-img-top img-fluid" height="130" src="{{ asset('assets/images/komunitas.png') }}" alt="Iuran image">
            </div>
        </div>

<!--BATAS-->

        <div class="col">
            <div class="card bg-success text-white h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-content-center" style="margin-top:-20px; margin-left:-15px;">
                        <h4 class="card-title mt-2 mr-2">
                            <img src="{{ asset('assets/images/titik.png') }}" width="27">
                            Anggota Keluarga
                        </h4>
                    </div>
                    <p class="card-text font-13">Informasi mengenai Daftar total anggota keluarga</p>
                    <h4 class="float-right" style="margin-bottom:-15px">
                        @if ($profilKeluarga->isNotEmpty())
                            {{ $profilKeluarga->count(), 0, ',', '.' }}
                        @else
                            0
                        @endif
                    </h4>
                </div>
                <img class="card-img-top img-fluid" height="130" src="{{ asset('assets/images/keluarga.png') }}"
                    alt="Iuran image">
            </div>
        </div>

        <div class="col">
            <div class="card bg-dark text-white h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-content-center" style="margin-top:-20px; margin-left:-15px;">
                        <h4 class="card-title mt-2 mr-2">
                            <img src="{{ asset('assets/images/titik.png') }}" width="27">
                            Rumah
                        </h4>
                    </div>
                    <p class="card-text font-13">Informasi mengenai total rumah yang ada dalam komunitas</p>
                    <h4 class="float-right" style="margin-bottom:-15px">
                        {{ $totalRumah }}
                    </h4>
                </div>
                <img class="card-img-top img-fluid" height="130" src="{{ asset('assets/images/rumah.png') }}" alt="Iuran image">
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col">
            <div class="card bg-transparent shadow-none">
                <div class="card-body">
                    <h3 class="mt-0 mb-2">
                        <i class="fa fa-bullhorn fs-1"></i> Keluhan dan Informasi
                    </h3>
                    <div class="autohide-scroll" style="height: 500px;">
                        @if ($hasRumah)
                            @php
                                $mergedData = $pengaduan->merge($informasi);
                                $sortedData = $mergedData->sortBy('created_at');
                                $reversedData = $sortedData->reverse();
                            @endphp

                            <!-- Perulangan data gabungan yang sudah terurut -->
                            @forelse ($reversedData as $data)
                                <div class="card">
                                    <div class="card-body">
                                        <h4>
                                            <div class="rounded-circle bg-primary d-inline-block p-2"></div>
                                            <a href="javascript:void(0);" class="text-dark" data-toggle="modal"
                                                @if ($data instanceof \App\Models\Pengaduan) data-target="#exampleModalCenter{{ $data->id }}"
                                    @elseif ($data instanceof \App\Models\Informasi)
                                    data-target="#exampleModalCenter{{ $data->id }}" @endif>
                                                @if ($data instanceof \App\Models\Pengaduan)
                                                    Pengaduan: {{ $data->judul_pengaduan }}
                                                @elseif ($data instanceof \App\Models\Informasi)
                                                    Informasi: {{ $data->judul_informasi }}
                                                @endif
                                            </a>
                                        </h4>
                                        <hr>
                                        <h4 class="text-danger">Dari : {{ $data->user->name }}</h4>
                                        <p>
                                            @if ($data instanceof \App\Models\Pengaduan)
                                                {{ $data->isi_pengaduan }}
                                            @elseif ($data instanceof \App\Models\Informasi)
                                                {{ $data->deskripsi_singkat }}
                                            @endif
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                                @if ($data instanceof \App\Models\Pengaduan)
                                    <div class="modal fade" id="exampleModalCenter{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-auto text-success"
                                                        id="exampleModalLongTitle">
                                                        {{ $data->judul_pengaduan }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body ml-3 mb-3">
                                                    <p>Isi Pesan Pengaduan:</p>
                                                    <h4>{{ $data->isi_pengaduan }}</h4>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p>Lokasi kejadian :</p>
                                                            <h5>{{ $data->lokasi_kejadian }}</h5>
                                                            <p>Waktu kejadian :</p>
                                                            <h5>{{ \Carbon\Carbon::parse($data->waktu_kejadian)->format('l, d F Y') }}
                                                            </h5>
                                                            <p>Pengirim pesan :</p>
                                                            <h5>{{ $data->user->name }}</h5>
                                                            <p>Penyebab kejadian :</p>
                                                            <h5>{{ $data->penyebab_kejadian }}</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <p>Foto lokasi kejadian :</p>
                                                            <img src="{{ asset('storage/' . $data['foto_pengaduan']) }}"
                                                                alt="Jalan Rusak" widht="150" height="150">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif ($data instanceof \App\Models\Informasi)
                                    <div class="modal fade" id="exampleModalCenter{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-auto text-success"
                                                        id="exampleModalLongTitle">
                                                        {{ $data->judul_informasi }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body ml-3 mb-3">
                                                    <p>Detail Informasi:</p>
                                                    <h4>{{ $data->deskripsi_singkat }}</h4>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <p>Isi Informasi :</p>
                                                            <h5>{{ $data->isi_informasi }}</h5>
                                                            <p>Waktu Informasi :</p>
                                                            <h5>{{ \Carbon\Carbon::parse($data->created_at)->format('l, d F Y') }}
                                                            </h5>
                                                            <p>Pengirim pesan :</p>
                                                            <h5>{{ $data->user->name }}</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <p>file informasi :</p>
                                                            <a href="{{ asset('storage/' . $data->file) }}"
                                                                class="text-muted font-600" download><i class="fa fa-file"
                                                                    style="font-size: 100px;"></i></a>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <p>Tidak ada Postingan</p>
                            @endforelse
                        @else
                            <div class="crad bg-white">
                                <div class="card-body">
                                    <p class="text-center" style="font-size: 16px;"><b>Tidak ada Postingan</b></p>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{-- <div class="autohide-scroll" style="height: 500px;">

                        <div class="card">
                            <div class="card-body">
                                <h4>
                                    <div class="rounded-circle bg-danger d-inline-block p-2"></div>
                                    <a href="javascript:void(0);" class="text-dark" data-toggle="modal"
                                        data-target="#exampleModalCenter">Jalan Berlubang</a>
                                </h4>
                                <hr>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer
                                    took a galley of type and scrambled it to make a type specimen book. It has survived not
                                    only
                                    five centuries, but also the leap into electronic typesetting, remaining essentially
                                    unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                                    Ipsum
                                    passages, and more recently with desktop publishing software like Aldus PageMaker
                                    including
                                    versions of Lorem Ipsum.</h5>
                                    <hr>
                                    <small>By Sukiman</small>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade ml-5" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ml-auto text-success" id="exampleModalLongTitle">Jalan Berlubang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ml-3 mb-3">
                    <p class="mt-2">Isi Pesan :</p>
                    <h4>Siang Pak RT, jalan di Jln. Merak sudah rusak parah dan berlubang. Mohon segera di perbaiki.</h4>
                    <div class="row">
                        <div class="col-6">
                            <p>Lokasi kejadian :</p>
                            <h5>Jalan Merak</h5>
                            <p>Waktu kejadian :</p>
                            <h5>Pukul 15.00</h5>
                            <p>Pengirim pesan :</p>
                            <h5>Sukijan</h5>
                            <p>Penyebab kejadian :</p>
                            <h5>Dilalui kendaraan berat</h5>
                        </div>
                        <div class="col-6 d-flax">
                            <p>Foto lokasi kejadian :</p>
                            <img src="{{ asset('image/jalan berlubang.jpg') }}" alt="" width="200px">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}



    @push('style')
    @endpush

    @push('javascript')
    @endpush
@endsection

        {{-- <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body p-4">
                    <div class="d-flex align-content-center" style="margin-top:-20px; margin-left:-15px;">
                        <h4 class="card-title mt-0">
                            <img src="{{ asset('assets/images/titik.png') }}" width="20">
                            Iuran Belum Lunas
                        </h4>
                    </div>
                    <p class="card-text font-13">Informasi mengenai total iuran yang belum lunas</p>
                    <h4 class="float-right" style="margin-bottom:-15px">
                        @php
                            // Menghitung total iuran yang belum lunas
                            $totalIuranBelumLunas = $iuran->sum('jumlah');

                            // Menghitung total iuran yang sudah lunas
                            $totalIuranLunas = $iuranPenggunas->sum('jumlah');
                        @endphp

                        @if ($totalIuranLunas > 0)
                            Rp.{{ number_format($totalIuranBelumLunas - $totalIuranLunas, 0, ',', '.') }}
                        @else
                            Rp.{{ number_format($totalIuranBelumLunas, 0, ',', '.') }}
                        @endif
                    </h4>
                </div>
            </div>



        </div>
        LINE 60--}}
