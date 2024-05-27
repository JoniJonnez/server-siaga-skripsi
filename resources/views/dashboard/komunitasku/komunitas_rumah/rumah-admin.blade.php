@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Rumah')
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
                        <li class="breadcrumb-item active">Pengaturan Rumah</li>
                    </ol>
                </div>
                <br>
                {{-- <h4 class="page-title">Pengaturan Komunitas</h4> --}}
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
                                        <h4 class="mt-4 d-inline-block">Daftar Rumah</h4>
                                    </div>
                                    <div class="form-group col-6 text-right mt-3">
                                        <button type="Update" class="btn btn-primary" data-toggle="modal"
                                            data-target="#tambahRumah">+Tambah</button>
                                    </div>

                                    <!-- modals Tambah data rumah-->
                                    <div class="modal fade" id="tambahRumah" tabindex="-1" role="dialog"
                                        aria-labelledby="tambahRumahLabel" aria-hidden="true">
                                        <div class="modal-dialog ml-auto modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex justify-content-center">
                                                    <h4 class="modal-title text-success" id="exampleModalLongTitle">
                                                        Tambah Data Rumah</h4>
                                                </div>
                                                <div class="modal-body m-3">
                                                    <form action="{{ route('rumah.store') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="komunitas_id"
                                                            value="{{ $getKomunitas['id'] }}">
                                                        <div class="form-group">
                                                            <label for="rt" class="col-form-label">RT</label>
                                                            <input class="form-control form-control-sm" name="rt"
                                                                type="text" id="rt" value="{{ old('rt') }}"
                                                                placeholder="Masukan RT berapa rumah anda"
                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                                required>

                                                            <label for="rw" class="col-form-label">RW</label>
                                                            <input class="form-control form-control-sm" name="rw"
                                                                type="text" id="rw" value="{{ old('rw') }}"
                                                                placeholder="Masukan RW berapa rumah anda"
                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                                required>

                                                            <label for="jalan" class="col-form-label">Jalan</label>
                                                            <input class="form-control form-control-sm" name="jalan"
                                                                type="text" id="jalan" value="{{ old('jalan') }}"
                                                                placeholder="Masukan nama jalan rumah anda">

                                                            <label for="blok" class="col-form-label">Blok</label>
                                                            <input class="form-control form-control-sm" name="blok"
                                                                type="text" id="blok" value="{{ old('blok') }}"
                                                                placeholder=" Masukan nama blok rumah anda">

                                                            <label for="kode_rumah" class="col-form-label">Kode
                                                                Rumah</label>
                                                            <input class="form-control form-control-sm" name="kode_rumah"
                                                                type="text" id="kode_rumah"
                                                                value="{{ old('kode_rumah') }}"
                                                                placeholder="Masukan nomor kode rumah anda">
                                                        </div>
                                                        <button type="submit"
                                                            class="btn-sm btn-success px-4 float-right">SIMPAN</button>
                                                        <button type="button"
                                                            class="btn-sm btn-danger px-4 float-right mr-3 waves-effect"
                                                            data-dismiss="modal">BATAL</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Tambah data rumah -->

                                </div>
                                <hr class="border">
                                <table id="tableRumah" class="table dataTables_wrapper dt-bootstrap4 no-footer">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>RT</th>
                                            <th>RW</th>
                                            <th>Jalan</th>
                                            <th>Blok</th>
                                            <th>Kode Rumah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $indexrumah = 1;
                                        @endphp
                                        @forelse ($rumah as $key=> $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                                <tr>
                                                    <td>{{ $indexrumah++ }}</td>
                                                    <td>{{ $data['rt'] }}</td>
                                                    <td>{{ $data['rw'] }}</td>
                                                    <td>{{ $data['jalan'] }}</td>
                                                    <td>{{ $data['blok'] }}</td>
                                                    <td>{{ $data['kode_rumah'] }}</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editDataModal{{ $data['id'] }}">
                                                            <i class="fa fa-edit mr-2" style="font-size: 20px"></i>
                                                        </a>
                                                        <a href="{{ route('hapusrumah.destroy', $data->id) }}">
                                                            <i class="fa fa-trash-o text-danger mr-2"
                                                                style="font-size: 20px"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                        <!-- Tambahkan baris data sesuai kebutuhan -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right m-2 mb-3">
                                <a href="{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}"
                                    class="btn btn-danger mr-2 px-4 text-center">KEMBALI</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.komunitasku.komunitas_rumah.popup')
    @endsection
