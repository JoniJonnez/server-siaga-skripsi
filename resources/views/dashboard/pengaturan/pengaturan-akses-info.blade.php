@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Akses Informasi')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pengaturan.index') }}">Pengaturan</a>
                        </li>
                        <li class="breadcrumb-item active">Pengaturan Akses Informasi</li>
                    </ol>
                </div>
                <h4 class="page-title">Pengaturan Akses Informasi</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" ;
                        style="display: none !important;" role="alert" id="success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="mdi mdi-check-circle mr-2"></i>Pengaturan Akses Informasi berhasil di update
                    </div>


                    <!-- Pertanyaan 1 -->
                    <div class="ml-3">
                        <p style="margin: 0;">1.&nbsp;&nbsp;Yang boleh melihat profil detail Saya</p>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox11" data-pertanyaan="Yang boleh melihat profil detail Saya"
                                name="pertanyaan1" value="Semua Pengguna" class="pertanyaan1"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail Saya'])) {{ $data['Yang boleh melihat profil detail Saya'] === 'Semua Pengguna' ? 'checked' : '' }} @endif>
                            <label for="checkbox11">Semua Pengguna</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox12" data-pertanyaan="Yang boleh melihat profil detail Saya"
                                name="pertanyaan1" value="Semua warga di komunitas saya bergabung" class="pertanyaan1"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail Saya'])) {{ $data['Yang boleh melihat profil detail Saya'] === 'Semua warga di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox12">Semua warga di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox13" data-pertanyaan="Yang boleh melihat profil detail Saya"
                                name="pertanyaan1" value="Pengurus di komunitas saya bergabung" class="pertanyaan1"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail Saya'])) {{ $data['Yang boleh melihat profil detail Saya'] === 'Pengurus di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox13">Pengurus di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3 mb-2">
                            <input type="checkbox" id="checkbox14" data-pertanyaan="Yang boleh melihat profil detail Saya"
                                name="pertanyaan1" value="Tidak ada" class="pertanyaan1" style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail Saya'])) {{ $data['Yang boleh melihat profil detail Saya'] === 'Tidak ada' ? 'checked' : '' }} @endif>
                            <label for="checkbox14">Tidak ada</label>
                        </div>
                    </div>

                    {{-- Pertanyaan 2 --}}
                    <div class="ml-3">
                        <p style="margin: 0;">2.&nbsp;&nbsp;Yang boleh melihat profil umum keluarga Saya</p>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox21"
                                data-pertanyaan="Yang boleh melihat profil umum keluarga Saya" name="pertanyaan2"
                                value="Semua Pengguna" class="pertanyaan2" style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil umum keluarga Saya'])) {{ $data['Yang boleh melihat profil umum keluarga Saya'] === 'Semua Pengguna' ? 'checked' : '' }} @endif>
                            <label for="checkbox21">Semua Pengguna</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox22"
                                data-pertanyaan="Yang boleh melihat profil umum keluarga Saya" name="pertanyaan2"
                                value="Semua warga di komunitas saya bergabung" class="pertanyaan2"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil umum keluarga Saya'])) {{ $data['Yang boleh melihat profil umum keluarga Saya'] === 'Semua warga di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox22">Semua warga di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox23"
                                data-pertanyaan="Yang boleh melihat profil umum keluarga Saya" name="pertanyaan2"
                                value="Pengurus di komunitas saya bergabung" class="pertanyaan2"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil umum keluarga Saya'])) {{ $data['Yang boleh melihat profil umum keluarga Saya'] === 'Pengurus di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox23">Pengurus di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3 mb-2">
                            <input type="checkbox" id="checkbox24"
                                data-pertanyaan="Yang boleh melihat profil umum keluarga Saya" name="pertanyaan2"
                                value="Tidak ada" class="pertanyaan2" style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil umum keluarga Saya'])) {{ $data['Yang boleh melihat profil umum keluarga Saya'] === 'Tidak ada' ? 'checked' : '' }} @endif>
                            <label for="checkbox24">Tidak ada</label>
                        </div>
                    </div>

                    {{-- Pertanyaan 3 --}}
                    <div class="ml-3">
                        <p style="margin: 0;">3.&nbsp;&nbsp;Yang boleh melihat profil detail keluarga Saya</p>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox31"
                                data-pertanyaan="Yang boleh melihat profil detail keluarga Saya" name="pertanyaan3"
                                value="Semua Pengguna" class="pertanyaan3" style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail keluarga Saya'])) {{ $data['Yang boleh melihat profil detail keluarga Saya'] === 'Semua Pengguna' ? 'checked' : '' }} @endif>
                            <label for="checkbox31">Semua Pengguna</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox32"
                                data-pertanyaan="Yang boleh melihat profil detail keluarga Saya" name="pertanyaan3"
                                value="Semua warga di komunitas saya bergabung" class="pertanyaan3"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail keluarga Saya'])) {{ $data['Yang boleh melihat profil detail keluarga Saya'] === 'Semua warga di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox32">Semua warga di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox33"
                                data-pertanyaan="Yang boleh melihat profil detail keluarga Saya" name="pertanyaan3"
                                value="Pengurus di komunitas saya bergabung" class="pertanyaan3"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail keluarga Saya'])) {{ $data['Yang boleh melihat profil detail keluarga Saya'] === 'Pengurus di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox33">Pengurus di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3 mb-2">
                            <input type="checkbox" id="checkbox34"
                                data-pertanyaan="Yang boleh melihat profil detail keluarga Saya" name="pertanyaan3"
                                value="Tidak ada" class="pertanyaan3" style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil detail keluarga Saya'])) {{ $data['Yang boleh melihat profil detail keluarga Saya'] === 'Tidak ada' ? 'checked' : '' }} @endif>
                            <label for="checkbox34">Tidak ada</label>
                        </div>
                    </div>

                    {{-- Pertanyaan 4 --}}
                    <div class="ml-3">
                        <p style="margin: 0;">4.&nbsp;&nbsp;Yang boleh melihat komunitas dimana Saya bergabung</p>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox41"
                                data-pertanyaan="Yang boleh melihat komunitas dimana Saya bergabung"
                                value="Semua Pengguna" name="pertanyaan4" class="pertanyaan4"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat komunitas dimana Saya bergabung'])) {{ $data['Yang boleh melihat komunitas dimana Saya bergabung'] === 'Semua Pengguna' ? 'checked' : '' }} @endif>
                            <label for="checkbox41">Semua Pengguna</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox42"
                                data-pertanyaan="Yang boleh melihat komunitas dimana Saya bergabung"
                                value="Semua warga di komunitas saya bergabung" name="pertanyaan4" class="pertanyaan4"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat komunitas dimana Saya bergabung'])) {{ $data['Yang boleh melihat komunitas dimana Saya bergabung'] === 'Semua warga di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox42">Semua warga di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox43"
                                data-pertanyaan="Yang boleh melihat komunitas dimana Saya bergabung"
                                value="Pengurus di komunitas saya bergabung" name="pertanyaan4" class="pertanyaan4"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat komunitas dimana Saya bergabung'])) {{ $data['Yang boleh melihat komunitas dimana Saya bergabung'] === 'Pengurus di komunitas saya bergabung' ? 'checked' : '' }} @endif>
                            <label for="checkbox43">Pengurus di komunitas saya bergabung</label>
                        </div>
                        <div class="ml-3 mb-3">
                            <input type="checkbox" id="checkbox44"
                                data-pertanyaan="Yang boleh melihat komunitas dimana Saya bergabung" value="Tidak ada"
                                name="pertanyaan4" class="pertanyaan4" style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat komunitas dimana Saya bergabung'])) {{ $data['Yang boleh melihat komunitas dimana Saya bergabung'] === 'Tidak ada' ? 'checked' : '' }} @endif>
                            <label for="checkbox44">Tidak ada</label>
                        </div>
                    </div>

                    <div>
                        <button type="button" class="btn btn-danger btn-sm col-1 mr-2"
                            onclick="window.location.href = '{{ route('pengaturan.index') }}'">Kembali</button>
                        <button type="submit" class="btn btn-success btn-sm col-1"
                            onclick="submitForm()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
