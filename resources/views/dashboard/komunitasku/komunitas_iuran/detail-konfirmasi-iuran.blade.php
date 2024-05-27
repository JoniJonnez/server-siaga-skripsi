@extends('dashboard.layouts.main')
@section('title', 'Detail Konfirmasi Iuran')
@section('content')
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
                            <a href="{{ route('iuranKomunitas.index') }}">Pengaturan Iuran</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('iuranKomunitas.konfirmasiIuran') }}">Konfirmasi Iuran</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Iuran</li>
                    </ol>
                </div>
                <h4 class="page-title">Detail Konfirmasi Iuran</h4>
            </div>
        </div>


        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="status_pembayaran" class="col-form-label" style="font-size: 14px;">Ubah Status
                            Pembayaran
                            Iuran</label>
                        <div class="button-items">
                            @if ($iuranPenggunas['status_pembayaran'] === 'menunggu konfirmasi')
                                <form method="POST"
                                    action="{{ route('pembayaran.updateStatus', ['status_updatate' => 'lunas', 'ids' => $iuranPenggunas['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success"
                                        onclick="toggleActive(this, 'lunas')">lunas</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('pembayaran.updateStatus', ['status_updatate' => 'belum lunas', 'ids' => $iuranPenggunas['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="toggleActive(this, 'belum lunas')">belum lunas</button>
                                </form>
                            @elseif($iuranPenggunas['status_pembayaran'] === 'lunas')
                                <form method="POST"
                                    action="{{ route('pembayaran.updateStatus', ['status_updatate' => 'menunggu konfirmasi', 'ids' => $iuranPenggunas['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning"
                                        onclick="toggleActive(this, 'menunggu konfirmasi')">menunggu konfirmasi</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('pembayaran.updateStatus', ['status_updatate' => 'belum lunas', 'ids' => $iuranPenggunas['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger"
                                        onclick="toggleActive(this, 'belum lunas')">belum lunas</button>
                                </form>
                            @elseif($iuranPenggunas['status_pembayaran'] === 'belum lunas')
                                <form method="POST"
                                    action="{{ route('pembayaran.updateStatus', ['status_updatate' => 'menunggu konfirmasi', 'ids' => $iuranPenggunas['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-warning"
                                        onclick="toggleActive(this, 'menunggu konfirmasi')">menunggu konfirmasi</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('pembayaran.updateStatus', ['status_updatate' => 'lunas', 'ids' => $iuranPenggunas['id']]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success"
                                        onclick="toggleActive(this, 'lunas')">lunas</button>
                                </form>
                            @endif
                        </div>
                        <hr>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="created_at" class="col-form-label" style="font-size: 14px;">Tanggal</label>
                                    <h5 class="mb-3">{{ $iuranPenggunas->iuran->created_at->format('d F Y') }}</h5>

                                    <label for="name" class="col-form-label" style="font-size: 14px;">Nama</label>
                                    <h5 class="mb-3">{{ $iuranPenggunas->user->name }}</h5>

                                    <label for="nama_iuran" class="col-form-label" style="font-size: 14px;">Nama
                                        Iuran</label>
                                    <h5 class="mb-3">{{ $iuranPenggunas->iuran->nama_iuran }}</h5>

                                    <label for="jumlah" class="col-form-label" style="font-size: 14px;">Jumlah
                                        Bayaran</label>
                                    <h5 class="mb-3">Rp.{{ number_format($iuranPenggunas->iuran->jumlah, 0, ',', '.') }}
                                    </h5>

                                    <label for="status_pembayaran" class="col-form-label" style="font-size: 14px;">Status
                                        Konfirmasi</label>
                                    <div class="mb-2">
                                        @if ($iuranPenggunas['status_pembayaran'] === 'menunggu konfirmasi')
                                            <span class="badge badge-boxed badge-warning">Menunggu Konfirmasi</span>
                                        @elseif ($iuranPenggunas['status_pembayaran'] === 'lunas')
                                            <span class="badge badge-boxed badge-success">Lunas</span>
                                        @elseif ($iuranPenggunas['status_pembayaran'] === 'belum lunas')
                                            <span class="badge badge-boxed badge-danger">Belum Lunas</span>
                                        @endif
                                    </div>
                                    <label for="tanggapan_iuran" class="col-form-label" style="font-size: 14px;">Tanggapan
                                        Pembyaaran Pengurus</label>
                                    <h5 class="mb-3">{{ $iuranPenggunas['tanggapan_iuran'] }}</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5>Informasi Pembayaran</h5>
                                <hr>
                                <label for="metode_pembayaran" class="col-form-label">Metode Pembayaran</label>
                                <h5 class="mb-3">{{ $iuranPenggunas->metode_pembayaran }}</h5>

                                <label for="status-konfirmasi" class="col-form-label">Jumlah Transfer</label>
                                <h5 class="mb-3">Rp.{{ number_format($iuranPenggunas['jumlah'], 0, ',', '.') }}</h5>

                                <label for="created_at" class="col-form-label">Tanggal Pembayaran</label>
                                <h5 class="mb-3">{{ $iuranPenggunas->created_at->format('d F Y') }}</h5>

                                <label for="keterangan" class="col-form-label">keterangan</label>
                                <h5 class="mb-3">{{ $iuranPenggunas->keterangan }}</h5>
                                <hr>
                                <h5 class="text-center">Bukti Pembayaran</h5>
                                <div class="text-center mb-2">
                                    <img src="{{ asset('storage/' . $iuranPenggunas->bukti_pembayaran) }}"
                                        alt="Bukti Pembayaran" width="150" height="150">
                                </div>
                                <div class="text-center">
                                    <a href="{{ asset('storage/' . $iuranPenggunas->bukti_pembayaran) }}" download>
                                        <button type="button" class="btn btn-secondary">
                                            <i class="fa fa-download"></i> Unduh Gambar
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <form action="{{ route('pembayaran.updateTanggapan', ['iuranPenggunas' => $iuranPenggunas['id']]) }}"
                method="POST">
                @method('POST')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tanggapan_iuran" class="col-form-label" style="font-size: 14px;">Tanggapan
                                pembayaran iuran</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="tanggapan_iuran" rows="4"
                                placeholder="Isi tanggapan pembayaran pengguna"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success px-4 float-right" onclick="submit()">
                            SIMPAN
                        </button>
                        <button type="button" class="btn btn-danger px-4 float-right mr-2"
                            onclick="window.location.href = '{{ route('iuranKomunitas.konfirmasiIuran', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button>
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
