@extends('dashboard.layouts.main')
@section('title', 'Input Pengeluaran')
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
                            <a href="{{ route('komunitas.index') }}">Pengaturan Keuangan</a>
                        </li>
                        <li class="breadcrumb-item active">Pengeluaran</li>
                    </ol>
                </div>
                <h4 class="page-title">Tambah pengeluaran</h4>
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
                                <h4 class="text-success mt-0">Data Pengeluaran</h4>
                                <div>
                                    <button class="btn btn-sm btn-primary mr-1" data-toggle="modal"
                                        data-target="#tambahPengeluaran">Tambah Pengeluaran</button>
                                </div>
                            </div>
                            <!-- Datatable Start -->
                            <div class="card">
                                <div class="card-body">
                                    <hr class="border">
                                    <table id="tableRumah" class="table dataTables_wrapper dt-bootstrap4 no-footer">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pengeluaran</th>
                                                <th>Keterangan Pengeluaran</th>
                                                <th>Jumlah</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $indexpengeluaran = 1;
                                            @endphp
                                            @forelse ($pengeluaran as $data)
                                                @if ($data->komunitas_id == $getKomunitas['id'])
                                                    <tr>
                                                        <td>{{ $indexpengeluaran++ }}</td>
                                                        <td>{{ $data->created_at->format('d F Y') }}</td>
                                                        <td>{{ $data->nama }}</td>
                                                        <td>{{ $data->keterangan }}</td>
                                                        <td>Rp.{{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('keuangan.edit', ['komunitas_id' => $getKomunitas['id'], $data->id]) }}">
                                                                <i class="fa fa-edit mr-2" style="font-size: 20px"></i>
                                                            </a>
                                                            <a href="{{ route('hapusPengeluaran.destroy', $data->id) }}">
                                                                <i class="fa fa-trash-o text-danger mr-2"
                                                                    style="font-size: 20px"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak ada data pengeluaran</td>
                                                </tr>
                                            @endforelse
                                            <!-- Tambahkan baris data sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                                onclick="window.location.href = '{{ route('keuangan.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('dashboard.komunitasku.komunitas_keuangan.popup')

@endsection
