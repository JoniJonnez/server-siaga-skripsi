@extends('dashboard.layouts.main')
@section('title', 'Detail Surat')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Lainnya</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('surat.index') }}">Surat</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Surat</li>
                    </ol>
                </div>
                <h4 class="page-title">Detail Surat</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="nama_pengirim" class="col-form-label">Nama Pengirim</label>
                            <h6 style="font-size: 15px">{{ $suratPengajuan->user->name }}</h6>

                            <label for="status_pengajuan" class="col-form-label">Status pengajuan</label>
                            <div>
                                @if (empty($suratPengajuan->status))
                                    <span class="badge badge-boxed badge-warning" style="font-size: 14px">Proses</span>
                                @elseif ($suratPengajuan->status === 'Proses')
                                    <span class="badge badge-boxed badge-warning" style="font-size: 14px">Proses</span>
                                @elseif ($suratPengajuan->status === 'Selesai')
                                    <span class="badge badge-boxed badge-success" style="font-size: 14px">Selesai</span>
                                @elseif ($suratPengajuan->status === 'Ditolak')
                                    <span class="badge badge-boxed badge-danger" style="font-size: 14px">Ditolak</span>
                                @endif
                            </div>

                            <label for="jenis_surat" class="col-form-label">Jenis Surat</label>
                            <h6 style="font-size: 15px">{{ $suratPengajuan->surat->jenis_surat }}</h6>

                            <label for="tanggal_surat" class="col-form-label">Tanggal Pembuatan Surat</label>
                            <h6 style="font-size: 15px">
                                {{ \Carbon\Carbon::parse($suratPengajuan->created_at)->format('d-m-Y') }}</h6>

                            <label for="keperluan_surat" class="col-form-label">Keperluan pembuatan surat</label>
                            <h6 style="font-size: 15px">{{ $suratPengajuan->keperluan_surat }}</h6>

                            <label for="tanggapan_surat" class="col-form-label" style="font-size: 14px;">Balasan
                                Surat</label>
                            <h6 class="mb-4" style="font-size: 15px">
                                @if ($suratPengajuan->tanggapan_surat)
                                    {{ $suratPengajuan->tanggapan_surat }}
                                @else
                                    Belum ada balasan
                                @endif
                            </h6>
                        </div>
                        <hr class="border mt-2 mb-2">


                        <div class="form-group">
                            <h5>Dokumen Pengajuan Surat</h5>
                            <div class="row">
                                <div class="col-lg-2 col-md-4">
                                    <div class="card bg-transparent shadow-none">
                                        @if ($suratPengajuan->file)
                                            <i class="fa fa-file-text-o fa-4x text-primary text-center"></i>
                                            <div class="py-2 text-center">
                                                <a href="{{ asset('storage/' . $suratPengajuan->file) }}"
                                                    class="text-muted font-600" download>Download</a>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                File tidak ada
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right m-2 mb-3">
                            <a href="{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}"
                                class="btn btn-danger mr-2 px-4 text-center">KEMBALI</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>

    <script>
        function toggleActive(button) {
            button.classList.toggle("active");
        }
    </script>

@endsection
