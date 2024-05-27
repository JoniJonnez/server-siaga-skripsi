@extends('dashboard.layouts.main')
@section('title', 'Buat Surat')
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
                        <li class="breadcrumb-item active">Buat Surat</li>
                    </ol>
                </div>
                <h4 class="page-title">Pengajuan Pembuatan Surat</h4>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form class="mb-3" action="{{ url('/dashboard/tambahsuratpengajuan') }}" method="POST">
                        @csrf
                        <input type="hidden" name="komunitas_id" value="{{ $getKomunitas->id }}">
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
                            <h6>Data yang dibutuhkan</h6>
                            <hr>
                            <div class="row mb-4" id="inputContainer">
                            </div>
                            <label for="keperluan_surat" class="col-form-label" style="font-size: 14px;">Keperluan Pembuatan
                                Surat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="keperluan_surat" rows="4"
                                placeholder="Isi keperluan pembuatan surat"></textarea>
                            <hr>
                            <!-- Tambahkan id "buatButton" pada tombol "Buat" -->
                            <button type="submit" class="btn btn-success px-4 float-right" id="buatButton">Simpan</button>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
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
                                            let inputs = "";
                                            $.each(result, function(index, item) {
                                                inputs += `
                                                <div class="col-4">
                                                    <label for="input_${item.syarat}">${item.value}</label>
                                                    <input type="text" class="form-control" id="input_${item.syarat}" name="syarat[${item.syarat}]" value="${item.value}" placeholder="Isi dengan ${item.value}">
                                                </div>
                                            `;
                                            });
                                            $("#inputContainer").html(inputs);
                                        },
                                        error: function(xhr, status, error) {
                                            console.log(xhr.responseText);
                                        }
                                    });
                                });
                            });
                        </script>


                        {{-- <div class="form-group">
                            <label for="jenis-surat" class="col-form-label">Jenis Surat</label>
                            <div class="mb-2">
                                <select class="form-control" name="jenis_surat" id="jenis_surat">
                                    @foreach ($surat as $data)
                                        <option value="{{ $data->jenis_surat }}">{{ $data->jenis_surat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama-lengkap" class="col-form-label">Nama Lengkap</label>
                            <div class="mb-2">
                                <input class="form-control" name="nama-lengkap" type="text" id="nama-lengkap"
                                    placeholder="Isi dengan nama lengkap">
                            </div>

                            <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
                            <div class="mb-2">
                                <select class="form-control" name="jenis_kelamin" type="text" id="jenis_kelamin"
                                    value="{{ old('jenis_kelamin') }}">
                                    <option>Jenis Kelamin</option>
                                    <option>Laki Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <label for="tempat_lahir" class="col-form-label">Tempat Lahir</label>
                                    <input class="form-control" name="tempat_lahir" type="text" id="tempat_lahir"
                                        value="{{ old('tempat-lahir') }}">
                                </div>
                                <div class="col-6">
                                    <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" value="{{ old('tanggal_lahir') }}"
                                        id="tanggal_lahir">
                                </div>
                            </div>

                            <label for="status-perkawinan" class="col-form-label">Status Perkawinan</label>
                            <div class="mb-2">
                                <input class="form-control" name="status-perkawinan" type="text" id="status-perkawinan"
                                    placeholder="isi status perkawinan">
                            </div>

                            <label for="nonik-passport-kitas" class="col-form-label">Nomor NIK/Passport/KITAS</label>
                            <div class="mb-2">
                                <input class="form-control" name="nonik-passport-kitas" type="text"
                                    id="nonik-passport-kitas" placeholder="isi data diri anda">
                            </div>

                            <label for="keperluan" class="col-form-label">Keperluan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                placeholder="Keperluan membuat surat tersebut"></textarea>
                        </div> --}}
                    </form>
                    <button type="button" class="btn btn-danger px-4 float-right mr-2"
                        onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">BATAL</button>

                </div>
            </div>
        </div>
    </div>

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
                        let inputs = "";
                        $.each(result, function(index, item) {
                            inputs += `
                        <div class="col-4">
                            <label for="input_${item.syarat}">${item.value}</label>
                            <input type="text" class="form-control" id="input_${item.syarat}" name="syarat[${item.syarat}]" value="${item.value}" placeholder="Isi dengan ${item.value}">
                        </div>
                    `;
                        });
                        $("#inputContainer").html(inputs);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script> --}}
@endsection
