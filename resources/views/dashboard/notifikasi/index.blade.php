@extends('dashboard.layouts.main')
@section('title', 'Notifikasi')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card bg-transparent shadow-none">
                <div class="card-body">
                    <h3 class="mt-0 mb-2">
                        <i class="fa fa-bullhorn fs-1"></i> Notifikasi
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
                                                    <h4 class="modal-title ml-auto text-success" id="exampleModalLongTitle">
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
                                    <!-- Modal Informasi -->
                                    <div class="modal fade" id="exampleModalCenter{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title ml-auto text-success" id="exampleModalLongTitle">
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
                </div>
            </div>
        </div>
    </div>
@endsection
