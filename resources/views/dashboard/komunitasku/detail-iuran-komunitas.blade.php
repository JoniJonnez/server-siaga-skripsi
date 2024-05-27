@extends('dashboard.layouts.main')
@section('title', 'Detail Iuran')
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
                        <li class="breadcrumb-item active">Detail Iuran</li>
                    </ol>
                </div>
                <h4 class="page-title">Detail Iuran</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card bg-transparent shadow-none">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body py-4">
                            <div class="d-flex justify-content-between mb-3">
                                <h4 class="text-success mt-0">Data detail iuran</h4>
                            </div>
                            <!-- Datatable Start -->
                            <div class="card">
                                <div class="card-body">
                                    <hr class="border">
                                    <table id="tableRumah" class="table dataTables_wrapper dt-bootstrap4 no-footer">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Yang membayar</th>
                                                <th>Jenis Iuran</th>
                                                <th>Jumlah</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($iuranPengguna as $data)
                                                @if ($data->iuran->komunitas_id === $getKomunitas->id)
                                                    <tr>
                                                        <td>{{ $data->created_at->format('d F Y') }}</td>
                                                        <td>{{ $data->user->name }}</td>
                                                        <td>{{ $data->iuran->nama_iuran }}</td>
                                                        <td>Rp.{{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                                                        <td>
                                                            @if ($data['status_pembayaran'] === 'menunggu konfirmasi')
                                                                <span class="badge badge-boxed badge-warning">Menunggu
                                                                    Konfirmasi</span>
                                                            @elseif ($data['status_pembayaran'] === 'lunas')
                                                                <span class="badge badge-boxed badge-success">Lunas</span>
                                                            @elseif($data['status_pembayaran'] === 'belum lunas')
                                                                <span class="badge badge-boxed badge-danger">Belum
                                                                    Lunas</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                                onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">KEMBALI</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
