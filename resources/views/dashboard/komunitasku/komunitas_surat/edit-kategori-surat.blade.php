@extends('dashboard.layouts.main')
@section('title', 'Edit Kategori Surat')
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
                        <li class="breadcrumb-item active">Pengaturan Surat</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('surat.updateKategori', [$surat->id, 'komunitas_id' => request('komunitas_id')]) }}"
                    method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="jenis-surat" class="col-form-label" style="font-size: 14px;">Detail Iuran</label>
                        <input class="form-control" name="jenis_surat" type="text" id="jenis_surat"
                            value="{{ $surat->jenis_surat }}" placeholder="Masukan kategosi surat">
                    </div>
                    <h5>Data yang dibutuhkan</h5>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-4">
                            <!-- Tambahkan atribut data-index untuk identifikasi data yang dipilih -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox1" name="data[0]lengkap"
                                    value="Nama Lengkap"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Nama Lengkap')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox1">Nama Lengkap</label>
                            </div>
                            <!-- Tambahkan atribut data-depends untuk menentukan syarat data yang dipilih bergantung pada data lain -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox3"
                                    data-parsley-multiple="groups" data-parsley-mincheck="3" value="Tempat, Tanggal Lahir"
                                    name="data[2]tmpt_tgl"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Tempat, Tanggal Lahir')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox3">Tempat/Tanggal Lahir</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox4"
                                    data-parsley-multiple="groups" data-parsley-mincheck="4" value="Pekerjaan"
                                    name="data[3]pekerjaan"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Pekerjaan')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox4">Pekerjaan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox5"
                                    data-parsley-multiple="groups" data-parsley-mincheck="5" value="Agama"
                                    name="data[4]agama"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Agama')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox5">Agama</label>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox6"
                                    data-parsley-multiple="groups" data-parsley-mincheck="6" value="Status Perkawinan"
                                    name="data[5]status_perkawinan"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Status Perkawinan')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox6">Status
                                    Perkawinan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox7"
                                    data-parsley-multiple="groups" data-parsley-mincheck="7" value="Kewarganegaraan"
                                    name="data[6]kewarganegaraan"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Kewarganegaraan')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox7">Kewarganegaraan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox8"
                                    data-parsley-multiple="groups" data-parsley-mincheck="8" value="Nomor NIK/Paspor"
                                    name="data[7]nik"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Nomor NIK/Paspor')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox8">Nomor
                                    NIK/Passpor</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox9"
                                    data-parsley-multiple="groups" data-parsley-mincheck="9" value="Nomor Kartu Keluarga"
                                    name="data[8]nokk"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Nomor Kartu Keluarga')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox9">Nomor
                                    Kartu Keluarga</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox10"
                                    data-parsley-multiple="groups" data-parsley-mincheck="10" value="Alamat Sesuai KTP"
                                    name="data[9]alamat"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Alamat Sesuai KTP')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox10">Alamat
                                    Sesuai
                                    KTP</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox11"
                                    data-parsley-multiple="groups" data-parsley-mincheck="11" value="Alamat Domisili"
                                    name="data[10]domisili"
                                    @foreach (json_decode($surat['syarat'], true) as $syarat)
                                        @if ($syarat === 'Alamat Domisili')
                                            checked @endif @endforeach>
                                <label class="custom-control-label" for="checkbox11">Alamat
                                    Domisili</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success px-4 float-right">SIMPAN</button>
                    <button type="button" class="btn btn-danger px-4 float-right mr-3"
                        onclick="window.location.href = '{{ route('surat.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button>

                </form>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk memperbarui status chekbox sesuai syarat data lain
        function updateCheckboxStatus(checkboxId, isChecked) {
            const dependentCheckboxes = document.querySelectorAll(checkboxId);
            dependentCheckboxes.forEach(checkbox => {
                checkbox.disabled = !isChecked;
                checkbox.checked = false;
            });
        }

        // Tambahkan event listener untuk setiap chekbox yang memiliki data-depends atribut
        const checkboxes = document.querySelectorAll('[data-depends]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const isChecked = this.checked;
                const dependsOn = this.getAttribute('data-depends');
                updateCheckboxStatus(dependsOn, isChecked);
            });
        });
    </script>
@endsection
