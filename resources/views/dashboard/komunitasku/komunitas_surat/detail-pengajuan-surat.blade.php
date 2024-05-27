@extends('dashboard.layouts.main')
@section('title', 'Detail Pengajuan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Lainnya Gunawan</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('surat.index') }}">Surat</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Surat</li>
                    </ol>
                </div>
                <h4 class="page-title">Detail Pengajuan Surat</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="status_suratPengajuan" class="col-form-label" style="font-size: 14px;">Ubah Status
                            Surat</label>
                        <div class="button-items">
                            {{-- @if ($suratPengajuan['status'] === 'Proses')
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Selesai', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success"
                                        onclick="toggleActive(this, 'Selesai')">Selesai</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Ditolak', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="toggleActive(this, 'Ditolak')">Ditolak</button>
                                </form>
                            @elseif($suratPengajuan['status'] === 'Selesai')
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Proses', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning"
                                        onclick="toggleActive(this, 'Proses')">Proses</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Ditolak', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="toggleActive(this, 'Ditolak')">Ditolak</button>
                                </form>
                            @elseif($suratPengajuan['status'] === 'Ditolak')
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Proses', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning"
                                        onclick="toggleActive(this, 'Proses')">Proses</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Selesai', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success"
                                        onclick="toggleActive(this, 'Selesai')">Selesai</button>
                                </form>
                            @endif --}}
                            @if (empty($suratPengajuan['status']))
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Selesai', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success"
                                        onclick="toggleActive(this, 'Selesai')">Selesai</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Ditolak', 'ids' => $suratPengajuan['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="toggleActive(this, 'Ditolak')">Ditolak</button>
                                </form>
                            @else
                                @if ($suratPengajuan['status'] === 'Proses')
                                    <form method="POST"
                                        action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Selesai', 'ids' => $suratPengajuan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success"
                                            onclick="toggleActive(this, 'Selesai')">Selesai</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Ditolak', 'ids' => $suratPengajuan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="toggleActive(this, 'Ditolak')">Ditolak</button>
                                    </form>
                                @elseif($suratPengajuan['status'] === 'Selesai')
                                    <form method="POST"
                                        action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Proses', 'ids' => $suratPengajuan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning"
                                            onclick="toggleActive(this, 'Proses')">Proses</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Ditolak', 'ids' => $suratPengajuan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="toggleActive(this, 'Ditolak')">Ditolak</button>
                                    </form>
                                @elseif($suratPengajuan['status'] === 'Ditolak')
                                    <form method="POST"
                                        action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Proses', 'ids' => $suratPengajuan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning"
                                            onclick="toggleActive(this, 'Proses')">Proses</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('surat.updateStatusSurat', ['status_updatate' => 'Selesai', 'ids' => $suratPengajuan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success"
                                            onclick="toggleActive(this, 'Selesai')">Selesai</button>
                                    </form>
                                @endif
                            @endempty
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_pengirim" class="col-form-label" style="font-size: 14px;">Nama Pengirim</label>
                    <h6 style="font-size: 15px">{{ $suratPengajuan->user->name }}</h6>

                    <label for="status_pengajuan" class="col-form-label" style="font-size: 14px;">Status
                        pengajuan</label>
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

                    <label for="jenis_surat" class="col-form-label" style="font-size: 14px;">Jenis Surat</label>
                    {{-- <h6 style="font-size: 15px">{{ $suratPengajuan->surat->jenis_surat }}</h6> --}}
                    <h6 style="font-size: 15px">
                        @if (!empty($suratPengajuan->surat->jenis_surat))
                            {{ $suratPengajuan->surat->jenis_surat }}
                        @else
                            Jenis surat ke hapus
                        @endif
                    </h6>

                    <label for="tanggal_surat" class="col-form-label" style="font-size: 14px;">Tanggal Pembuatan
                        Surat</label>
                    <h6 style="font-size: 15px">
                        {{ \Carbon\Carbon::parse($suratPengajuan->created_at)->format('d-m-Y') }}</h6>

                    <label for="keperluan_surat" class="col-form-label" style="font-size: 14px;">Keperluan pembuatan
                        surat</label>
                    <h6 style="font-size: 15px">{{ $suratPengajuan->keperluan_surat }}</h6>
                    <label for="keperluan_surat" class="col-form-label" style="font-size: 14px;">Balasan
                        Surat</label>
                    <h6 class="mb-4" style="font-size: 15px">{{ $suratPengajuan->tanggapan_surat }}</h6>
                </div>

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
                <hr class="border mt-2 mb-2">
            </div>
        </div>
        <form action="{{ route('surat.update', $suratPengajuan['id']) }}" method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group mb-3">
                            <label for="file" class="col-form-label" style="font-size: 14px;">Pilih File
                                Surat</label>
                            <input type="file" class="form-control-file" id="file" name="file" required>
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <label for="tanggapan_surat" class="col-form-label" style="font-size: 14px;">Tanggapan
                            Surat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="tanggapan_surat" rows="4"
                            placeholder="Isi tanggapan anda"></textarea>
                    </div>
                    <div class="text-right m-2 mb-3">
                        <button type="submit" class="btn btn-success px-4 float-right">Simpan</button>
                        <a href="{{ route('pengajuan-surat.Pengajuan', ['komunitas_id' => $getKomunitas['id']]) }}"
                            class="btn btn-danger mr-2 px-4 text-center">KEMBALI</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleActive(button) {
        button.classList.toggle("active");
    }
</script>

@endsection
