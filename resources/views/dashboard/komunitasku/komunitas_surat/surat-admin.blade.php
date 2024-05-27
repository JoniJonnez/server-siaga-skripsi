@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Surat')
@section('content')
    <style>
        table {
            width: 100%;
        }

        td.syarat {
            max-width: 300px;
        }
    </style>

    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Komunitasku</li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('komunitas.index') }}">Komunitas</a>
                        </li>
                        <li class="breadcrumb-item active">Pengaturan Surat</li>
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

                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h4 class="mt-0 d-inline-block">Pengaturan Surat</h4>
                                    </div>
                                    <div>
                                        <button type="Update" class="btn btn-primary" data-toggle="modal"
                                            data-target="#tambahsuratModal">+Tambah</button>
                                        <button type="button" class="btn btn-info"
                                            onclick="window.location.href='{{ route('pengajuan-surat.Pengajuan', ['komunitas_id' => $getKomunitas['id']]) }}'">Data
                                            pengajuan surat</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="table">
                                    <h5>Jenis Surat :</h5>
                                    <select class="form-control" name="jenis_surat" id="pilih_jenis_surat">
                                        <option selected disabled> Pilih surat</option>
                                        @foreach ($surats as $data)
                                            @if ($data->komunitas_id == $getKomunitas['id'])
                                                <option value="{{ $data->id }}">{{ $data->jenis_surat }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <h6>Data yang di butuhkan</h6>
                                    <hr>
                                    <div class="row mb-4" id="checkboxContainer">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="tableSurat" class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Surat</th>
                                    <th>Syarat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nosurat = 1;
                                @endphp
                                @forelse ($surat as $data)
                                    @if ($data->komunitas_id == $getKomunitas['id'])
                                        <tr>
                                            <td>{{ $nosurat++ }}</td>
                                            <td class="nama-surat">{{ $data->jenis_surat }}</td>
                                            <td class="syarat">
                                                @php
                                                    $syaratList = json_decode($data->syarat, true);
                                                @endphp

                                                @if (count($syaratList) > 0)
                                                    <ul>
                                                        @foreach ($syaratList as $key => $syarat)
                                                            @if ($loop->iteration <= 3)
                                                                <li>{{ $syarat }}</li>
                                                            @endif

                                                            @if ($loop->iteration === 3 && count($syaratList) > 3)
                                                                <li style="list-style-type:none; color: #44A2D2">
                                                                    Selengkapnya...</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p>Tidak ada syarat yang tersedia.</p>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                </a>
                                                <a
                                                    href="{{ route('surat.edit', ['komunitas_id' => $getKomunitas['id'], $data->id]) }}">
                                                    <i class="fa fa-edit mr-2" style="font-size: 20px"></i>
                                                </a>
                                                <a href="{{ route('hapussurat.destroy', $data->id) }}">
                                                    <i class="fa fa-trash-o text-danger mr-2" style="font-size: 20px"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <p>Data kategori surat kosong</p>
                                @endforelse
                            </tbody>
                        </table>

                        <button type="button" class="btn btn-danger px-4 float-right mt-4 mr-2"
                            onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">KEMBALI</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.komunitasku.komunitas_surat.popup')

    <!-- script untuk menampilkan isi dari kategori surat -->
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#pilih_jenis_surat").change(function() {
                let id_jenis = $(this).val();
                $.ajax({
                    url: "{{ url('/dashboard/pilih_jenis_surat') }}",
                    type: "GET",
                    data: {
                        id_jenis: id_jenis
                    },
                    success: function(result) {
                        let checkboxes = "";
                        $.each(result, function(index, item) {
                            checkboxes += `
                            <div class="col-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox_${item.syarat}"
                                        name="syarat[${item.syarat}]" value="${item.value}" ${item.value ? 'checked' : ''}>
                                    <label class="custom-control-label" for="checkbox_${item.syarat}">${item.value}</label>
                                </div>
                            </div>
                        `;
                        });
                        $("#checkboxContainer").html(checkboxes);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script> --}}
    <!-- END script untuk menampilkan isi dari kategori surat -->



@endsection
