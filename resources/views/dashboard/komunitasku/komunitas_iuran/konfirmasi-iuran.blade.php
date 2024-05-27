@extends('dashboard.layouts.main')
@section('title', 'Iuran Warga')
@section('content')
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
                    <li class="breadcrumb-item active">Konfirmasi iuran warga</li>
                </ol>
            </div>
            <h4 class="page-title">Konfirmasi Pembayaran Iuran Warga</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <i class="dripicons-view-list mr-2"></i>
                    <h4 class="mt-3 d-inline-block">Daftar Konfirmasi Pembayaran Iuran</h4>
                </div>
                <div class="">
                    <div class="input-group">
                    </div>
                </div>
            </div>
            <hr>
            <!-- tabel iuran-->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>Nama Iuran</th>
                                    <th>Jumlah Bayaran</th>
                                    <th>Status Konfirmasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iuranPenggunas as $data)
                                    @if ($data->komunitas_id == $getKomunitas['id'])
                                        @if ($data->status_pembayaran !== 'belum lunas')
                                            <tr>
                                                <td>{{ $data['created_at']->format('d F Y') }}</td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->iuran->nama_iuran }}</td>
                                                <td>Rp.{{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                                                <td>
                                                    @if ($data->status_pembayaran === 'menunggu konfirmasi')
                                                        <span class="badge badge-boxed badge-warning">Menunggu
                                                            Konfirmasi</span>
                                                    @elseif ($data->status_pembayaran === 'lunas')
                                                        <span class="badge badge-boxed badge-success">Lunas</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a
                                                        href="{{ route('detailKonfirmasiIuran.detailKonfirmasi', ['komunitas_id' => $getKomunitas['id'], 'iuranPengguna_id' => $data->id]) }}">
                                                        <!-- Menggunakan $data->id untuk menambahkan id yang dipilih dalam URL -->
                                                        <i class="fa fa-check-square-o mr-2 font-20"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                onclick="window.location.href = '{{ route('iuranKomunitas.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button>
        </div>
    </div>
@endsection
