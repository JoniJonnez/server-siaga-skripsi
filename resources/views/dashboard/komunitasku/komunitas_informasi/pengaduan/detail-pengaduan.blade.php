@extends('dashboard.layouts.main')
@section('title', 'Detail Pengaduan')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Lainnya</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('pengaduan.index') }}">Pengaduan</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Pengaduan</li>
                    </ol>
                </div>
                <h4 class="page-title">Detail Pengaduan</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        @if (Auth::user()->status != 'Warga')
                            <label for="status_pengaduan" class="col-form-label">Ubah Status Pengaduan</label>
                            <div class="button-items">
                                @if ($pengaduan['status_pengaduan'] === 'Proses')
                                    <form method="POST"
                                        action="{{ route('pengaduan.updateStatus', ['status_updatate' => 'Selesai', 'ids' => $pengaduan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success"
                                            onclick="toggleActive(this, 'Selesai')">Selesai</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('pengaduan.updateStatus', ['status_updatate' => 'Ditolak', 'ids' => $pengaduan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="toggleActive(this, 'Ditolak')">Ditolak</button>
                                    </form>
                                @elseif($pengaduan['status_pengaduan'] === 'Selesai')
                                    <form method="POST"
                                        action="{{ route('pengaduan.updateStatus', ['status_updatate' => 'Proses', 'ids' => $pengaduan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning"
                                            onclick="toggleActive(this, 'Proses')">Proses</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('pengaduan.updateStatus', ['status_updatate' => 'Ditolak', 'ids' => $pengaduan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="toggleActive(this, 'Ditolak')">Ditolak</button>
                                    </form>
                                @elseif($pengaduan['status_pengaduan'] === 'Ditolak')
                                    <form method="POST"
                                        action="{{ route('pengaduan.updateStatus', ['status_updatate' => 'Proses', 'ids' => $pengaduan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning"
                                            onclick="toggleActive(this, 'Proses')">Proses</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('pengaduan.updateStatus', ['status_updatate' => 'Selesai', 'ids' => $pengaduan['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success"
                                            onclick="toggleActive(this, 'Selesai')">Selesai</button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    </div>

                    <form>
                        <div class="form-group">
                            <label for="name" class="col-form-label" style="font-size: 14px;">Nama Pengirim</label>
                            <h6>{{ $pengaduan->user->name }}</h6>

                            <label for="status_pengaduan" class="col-form-label">Status Pengaduan</label>
                            <div>
                                @if ($pengaduan['status_pengaduan'] === 'Proses')
                                    <span
                                        class="badge badge-boxed badge-warning">{{ $pengaduan['status_pengaduan'] }}</span>
                                    <h6 class="text-dark ml-1"></h6>
                                @elseif ($pengaduan['status_pengaduan'] === 'Selesai')
                                    <span
                                        class="badge badge-boxed badge-success">{{ $pengaduan['status_pengaduan'] }}</span>
                                    <h6 class="text-dark ml-1"></h6>
                                @elseif ($pengaduan['status_pengaduan'] === 'Ditolak')
                                    <span
                                        class="badge badge-boxed badge-danger">{{ $pengaduan['status_pengaduan'] }}</span>
                                    <h6 class="text-dark ml-1"></h6>
                                @endif
                            </div>

                            <label for="judul-pengaduan" class="col-form-label">Judul Pengaduan</label>
                            <h6>{{ $pengaduan['judul_pengaduan'] }}</h6>

                            <label for="lokasi-kejadian" class="col-form-label">Lokasi Kejadian</label>
                            <h6>{{ $pengaduan['lokasi_kejadian'] }}</h6>

                            <label for="waktu-kejadian" class="col-form-label">Waktu Kejadian</label>
                            <h6>{{ $pengaduan['waktu_kejadian'] }}</h6>

                            <label for="penyebab-kejadian" class="col-form-label">Penyebab Kejadian</label>
                            <h6>{{ $pengaduan['penyebab_kejadian'] }}</h6>

                            <label for="isi-pengaduan" class="col-form-label">Isi Pengaduan</label>
                            <h6>{{ $pengaduan['isi_pengaduan'] }}</h6>

                        </div>
                        <div class="form-group">
                            <label for="imageInput">Foto Lokasi Kejadian</label>
                            <div>
                                <img src="{{ asset('storage/' . $pengaduan['foto_pengaduan']) }}" alt="Jalan Rusak"
                                    widht="150" height="150">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tanggapan_pengaduan">Tanggapan Dari Admin</label>
                            <h6>{{ $pengaduan['tanggapan_pengaduan'] }}</h6>
                        </div>
                    </form>
                    <hr class="border">
                    <form action="{{ route('pengaduan.update', $pengaduan['id']) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        @if (Auth::user()->status != 'Warga')
                            <div class="form-group">
                                <label for="tanggapan_pengaduan" class="col-form-label">Tanggapan Pengaduan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="tanggapan_pengaduan" rows="4"
                                    placeholder="Isi tanggapan anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success px-4 float-right"
                                onclick="submit()">SIMPAN</button>
                        @endif
                        <button type="button" class="btn btn-danger px-4 float-right mr-2"
                            onclick="window.location.href='{{ route('pengaduan.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button>
                    </form>
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
