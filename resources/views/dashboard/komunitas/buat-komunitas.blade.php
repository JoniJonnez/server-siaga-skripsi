@extends('dashboard.layouts.main')
@section('title', 'Buat Komunitas')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bg-transparent shadow-none">
                <div class="card-body">
                    <h4 class="text-success mt-0">Masukkan Detail Komunitasmu</h4>
                    <hr>
                    <form action="{{ route('buatkomunitas.actioncreate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="nama_komunitas" class="col-form-label">Nama Perumahan/Komunitas</label>
                                    <input class="form-control" name="nama_komunitas" type="text" id="nama_komunitas"
                                        value="{{ old('nama_komunitas') }}">
                                    @error('nama_komunitas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="moto_komunitas" class="col-form-label">Moto Komunitas</label>
                                    <input class="form-control" name="moto_komunitas" type="text" id="moto_komunitas"
                                        value="{{ old('moto_komunitas') }}">
                                    @error('moto_komunitas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- foto Komunitas -->
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="logo_komunitas" class="col-form-label">Foto Komunitas</label>
                                    <input class="form-control-file" name="logo_komunitas" type="file"
                                        id="logo_komunitas" accept=".jpg, .jpeg, .png">
                                    @error('logo_komunitas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Foto Komunitas -->

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="alamat_komunitas" class="col-form-label">Alamat Komunitas</label>
                                    <input class="form-control" name="alamat_komunitas" type="text" id="alamat_komunitas"
                                        value="{{ old('alamat_komunitas') }}">
                                    @error('alamat_komunitas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="deskripsi_komunitas" class="col-form-label">Deskripsi singkat
                                        Komunitas</label>
                                    <textarea class="form-control" name="deskripsi_komunitas" id="deskripsi_komunitas" rows="5">{{ old('deskripsi_komunitas') }}</textarea>
                                    @error('deskripsi_komunitas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="provinsi" class="col-form-label">Provinsi</label>
                                    <select class="form-control" name="provinsi" type="text" id="provinsi"
                                        value="{{ old('provinsi') }}">
                                        <option>Pilih Provinsi Anda</option>
                                        <option value="Aceh">Aceh</option>
                                        <option value="Bali">Bali</option>
                                        <option value="Bangka Belitung">Bangka Belitung</option>
                                        <option value="Banten">Banten</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="Maluku">Maluku</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Sulawesi Barat">Sulawesi Barat</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Yogyakarta">Yogyakarta</option>
                                    </select>
                                    @error('provinsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan" class="col-form-label">Kecamatan</label>
                                    <select class="form-control" name="kecamatan" type="text" id="kecamatan"
                                        value="{{ old('kecamatan') }}">
                                        <option>Pilih Kecamatan Anda</option>
                                        <option value="Anjatan">Anjatan</option>
                                        <option value="Bongas">Bongas</option>
                                        <option value="Babakan">Babakan</option>
                                        <option value="Balongan">Balongan</option>
                                        <option value="Cantigi">Cantigi</option>
                                        <option value="Cikedung">Cikedung</option>
                                        <option value="Gantar">Gantar</option>
                                        <option value="Haurgeulis">Haurgeulis</option>
                                        <option value="Indramayu">Indramayu</option>
                                        <option value="Juntinyuat">Juntinyuat</option>
                                        <option value="Jatibarang">Jatibarang</option>
                                        <option value="Krangkeng">Krangkeng</option>
                                        <option value="Kandanghaur">Kandanghaur</option>
                                        <option value="Lelea">Lelea</option>
                                        <option value="Losarang">Losarang</option>
                                        <option value="Pasekan">Pasekan</option>
                                        <option value="Sindang">Sindang</option>
                                        <option value="Sliyeg">Sliyeg</option>
                                        <option value="Sindangwangi">Sindangwangi</option>
                                        <option value="Talun">Talun</option>
                                        <option value="Widasari">Widasari</option>
                                    </select>
                                    @error('kecamatan')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode_pos" class="col-form-label">Kode Pos</label>
                                    <input class="form-control" name="kode_pos" type="text" id="kode_pos"
                                        value="{{ old('kode_pos') }}" maxlength="5" minlength="5"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    @error('kode_pos')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="kabupaten" class="col-form-label">Kabupaten</label>
                                    <select class="form-control" name="kabupaten" type="text" id="kabupaten"
                                        value="{{ old('kabupaten') }}">
                                        <option>Pilih Kabupaten Anda</option>
                                        <option value="Bandung">Bandung</option>
                                        <option value="Bekasi">Bekasi</option>
                                        <option value="Bogor">Bogor</option>
                                        <option value="Ciamis">Ciamis</option>
                                        <option value="Cianjur">Cianjur</option>
                                        <option value="Cirebon">Cirebon</option>
                                        <option value="Garut">Garut</option>
                                        <option value="Indramayu">Indramayu</option>
                                        <option value="Karawang">Karawang</option>
                                        <option value="Kuningan">Kuningan</option>
                                        <option value="Majalengka">Majalengka</option>
                                        <option value="Pangandaran">Pangandaran</option>
                                        <option value="Purwakarta">Purwakarta</option>
                                        <option value="Subang">Subang</option>
                                        <option value="Sukabumi">Sukabumi</option>
                                        <option value="Sumedang">Sumedang</option>
                                        <option value="Tasikmalaya">Tasikmalaya</option>
                                    </select>
                                    @error('kabupaten')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="desa" class="col-form-label">Kelurahan/Desa</label>
                                    <select class="form-control" name="desa" type="text" id="desa"
                                        value="{{ old('desa') }}">
                                        <option>Pilih kelurahan/Desa Anda</option>
                                        <option value="Balongan">Balongan</option>
                                        <option value="Rawadalem">Rawadalem</option>
                                        <option value="Sukarja">Sukarja</option>
                                        <option value="Sukaurip">Sukaurip</option>
                                        <option value="Tegal Sumbadra">Tegal Sumbadra</option>
                                        <option value="SUdimampir">SUdimampir</option>
                                        <option value="Tegalurung">Tegalurung</option>
                                        <option value="Majakerja">Majakerja</option>
                                        <option value="Gelarmendala">Gelarmendala</option>
                                    </select>
                                    @error('desa')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success px-4 float-right">SIMPAN</button>
                                    <button type="button" class="btn btn-danger px-4 float-right mr-3"
                                        onclick="window.location.reload()">BATAL</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
