@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Iuran')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Komunitasku</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('komunitas.index') }}">Komunitas</a>
                        </li>
                        <li class="breadcrumb-item active">Pengaturan Iuran</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card bg-transparent shadow-none">
                    <div class="card-body bg-white">
                        <!-- Profil Komunitas Perumahan -->
                        <div class="card">
                            <div class="card-body"
                                style="background: linear-gradient(to top, {{ $getKomunitas['warna_skunder'] }}, {{ $getKomunitas['warna_primer'] }});">
                                <div class="row">
                                    <div class="col-3 d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('storage/' . $getKomunitas['logo_komunitas']) }}" alt=""
                                            class="rounded-circle img-thumbnail thumb-xl">
                                        <div class="online-circle"></div>
                                    </div>
                                    <div class="col-7 text-center text-white">
                                        <h3>{{ $getKomunitas['nama_komunitas'] }}</h3>
                                        <p>"{{ $getKomunitas['moto_komunitas'] }}"</p>
                                        <hr class="col-9" style="border-color:#fff">
                                        <div class="d-flex justify-content-around">
                                            <span class="w-20">
                                                <i class="dripicons-user"></i>
                                                <p class="d-inline-block">{{ $getKomunitas->jumlah_warga }}</p>
                                            </span>
                                            <span class="w-20">
                                                <i class="dripicons-home"></i>
                                                <p class="d-inline-block">{{ $getKomunitas->jumlah_rumah }}</p>
                                            </span>
                                            <span class="w-35">
                                                <i
                                                    class="dripicons-location">{{ Str::limit($getKomunitas->alamat_komunitas, 30, '...') }}</i>
                                            </span>
                                            <span class="w-25">
                                                <i class="mdi mdi-phone"></i>
                                                <p class="d-inline-block">{{ $getKomunitas->no_tlp }}</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <i class="dripicons-view-list mr-2"></i>
                                        <h4 class="mt-4 d-inline-block">Daftar Iuran</h4>
                                    </div>
                                    <div class="form-group col-6 text-right mt-3">
                                        <a href="{{ route('iuranKomunitas.konfirmasiIuran', ['komunitas_id' => $getKomunitas['id']]) }}"
                                            class="btn btn-primary mr-2">Konfirmasi Iuran warga</a>
                                        <a href="{{ route('iuranKomunitas.create', ['komunitas_id' => $getKomunitas['id']]) }}"
                                            class="btn btn-primary">+Tambah
                                            Iuran</a>
                                    </div>
                                </div>
                                <hr class="border">
                                <table id="tableIuran" class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama Iuran</th>
                                            <th>Jumlah</th>
                                            <th>Periode</th>
                                            <th>Jenis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $iuran = $iuran->reverse();
                                        @endphp
                                        @foreach ($iuran as $data)
                                            <tr>
                                                <td>{{ $data['created_at']->format('d F Y') }}</td>
                                                <td>{{ $data['nama_iuran'] }}</td>
                                                <td>Rp.{{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                                                <td>{{ $data['periode'] }}</td>
                                                <td>{{ $data['status_iuran'] }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('iuranKomunitas.edit', ['komunitas_id' => $getKomunitas['id'], $data['id']]) }}">
                                                        <i class="fa fa-edit mr-2 font-20"></i>
                                                    </a>
                                                    <a href="{{ route('iuranWarga.destroyIuran', $data->id) }}">
                                                        <i class="fa fa-trash-o text-danger mr-2"
                                                            style="font-size: 20px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- @forelse ($iuran->reverse() as $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                            <tr>
                                                <td>{{ $data['created_at']->format('d F Y') }}</td>
                                                <td>{{ $data['nama_iuran'] }}</td>
                                                <td>Rp.{{ number_format($data['jumlah'], 0, ',', '.') }}</td>
                                                <td>{{ $data['periode'] }}</td>
                                                <td>{{ $data['status_iuran'] }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('iuranKomunitas.edit', ['komunitas_id' => $getKomunitas['id'], $data['id']]) }}">
                                                        <i class="fa fa-edit mr-2 font-20"></i>
                                                    </a>
                                                    <a href="{{ route('iuranWarga.destroyIuran', $data->id) }}">
                                                        <i class="fa fa-trash-o text-danger mr-2"
                                                            style="font-size: 20px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                        @empty
                                        @endforelse --}}
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                            onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">KEMBALI</button>
                        {{-- <button type="submit" class="btn btn-danger px-4 float-right mr-3"
                            onclick="window.location.href = '{{ route('komunitas.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button> --}}
                    </div>
                </div>
            </div>
        </div>








    </div>
@endsection
