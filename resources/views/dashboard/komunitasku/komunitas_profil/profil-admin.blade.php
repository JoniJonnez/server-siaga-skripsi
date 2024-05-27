@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Profil')
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
                        <li class="breadcrumb-item active">Pengaturan Profil Komunitas</li>
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
                                style="background: linear-gradient(to top, {{ $getKomunitas->warna_skunder }},{{ $getKomunitas->warna_primer }})">
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

                        <div class="card bg-transparent shadow-none">
                            <div class="card-body">
                                <form
                                    action="{{ route('komunitas.update', ['komunitas_id' => $getKomunitas['id'], $getKomunitas['id']]) }}"
                                    id="form-update-akun" method="POST" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                                    <div class="mb-4">
                                        <h4 class="text-success">Profil Komunitas</h4>
                                        <hr class="border">
                                        <div class="form-group">
                                            <label for="nama_komunitas" class="col-form-label" style="font-size: 14px;">Nama
                                                Komunitas</label>
                                            <input class="form-control mb-2" name="nama_komunitas" type="text"
                                                id="nama_komunitas"
                                                value="{{ old('nama_komunitas', $getKomunitas['nama_komunitas']) }}">
                                            @error('nama_komunitas')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                            <label for="moto_komunitas" class="col-form-label" style="font-size: 14px;">Moto
                                                Komunitas</label>
                                            <input class="form-control" name="moto_komunitas" type="text"
                                                id="moto_komunitas"
                                                value="{{ old('moto_komunitas', $getKomunitas['moto_komunitas']) }}">
                                            @error('moto_komunitas')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <h4 class="text-success">Alamat Komunitas</h4>
                                    <hr class="border">
                                    <div class="form-group">
                                        <label for="provinsi" class="col-form-label"
                                            style="font-size: 14px;">Provinsi</label>
                                        <div class="mb-2">
                                            <select class="form-control" name="provinsi" type="text" id="provinsi"
                                                value="{{ old('provinsi') }}">
                                                <option value="Aceh">Aceh</option>
                                                <option value="Bali">Bali</option>
                                                <option value="Bangka Belitung">Bangka Belitung</option>
                                                <option value="Banten">Banten</option>
                                                <option value="Bengkulu">Bengkulu</option>
                                                <option value="DKI Jakarta">DKI Jakarta</option>
                                                <option value="Gorontalo">Gorontalo</option>
                                                <option value="Jambi">Jambi</option>
                                                <option selected value="{{ $getKomunitas['provinsi'] }}">
                                                    {{ $getKomunitas['provinsi'] }}</option>
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
                                                <option value="Jawa Barat">Jawa Barat</option>
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
                                        {{-- <label for="provinsi" class="col-form-label"
                                            style="font-size: 14px;">Provinsi</label>
                                        <input class="form-control mb-2" name="provinsi" type="text" id="provinsi"
                                            value="{{ old('provinsi', $getKomunitas['provinsi']) }}">
                                        @error('provinsi')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror --}}
                                        <label for="kota" class="col-form-label"
                                            style="font-size: 14px;">Kota/Kabupaten</label>
                                        <div class="mb-2">
                                            <select class="form-control" name="kota" type="text" id="kota">
                                                <option value="Bandung">Bandung</option>
                                                <option value="Bekasi">Bekasi</option>
                                                <option value="Bogor">Bogor</option>
                                                <option value="Ciamis">Ciamis</option>
                                                <option value="Cianjur">Cianjur</option>
                                                <option value="Cirebon">Cirebon</option>
                                                <option value="Garut">Garut</option>
                                                <option selected value="{{ $getKomunitas['kabupaten'] }}">
                                                    {{ $getKomunitas['kabupaten'] }}</option>
                                                <option value="Karawang">Karawang</option>
                                                <option value="Kuningan">Kuningan</option>
                                                <option value="Majalengka">Majalengka</option>
                                                <option value="Pangandaran">Pangandaran</option>
                                                <option value="Purwakarta">Purwakarta</option>
                                                <option value="Subang">Subang</option>
                                                <option value="Sukabumi">Sukabumi</option>
                                                <option value="Sumedang">Sumedang</option>
                                                <option value="Indramayu">Indramayu</option>
                                                <option value="Tasikmalaya">Tasikmalaya</option>
                                            </select>
                                            @error('kota')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <label for="kabupaten" class="col-form-label"
                                            style="font-size: 14px;">Kota/Kabupaten</label>
                                        <input class="form-control mb-2" name="kabupaten" type="text" id="kabupaten"
                                            value="{{ old('kabupaten', $getKomunitas['kabupaten']) }}">
                                        @error('kabupaten')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror --}}
                                        <label for="kecamatan" class="col-form-label"
                                            style="font-size: 14px;">Kecamatan</label>
                                        <div class="mb-2">
                                            <select class="form-control" name="kecamatan" type="text" id="kecamatan">
                                                <option value="Anjatan">Anjatan</option>
                                                <option value="Bongas">Bongas</option>
                                                <option value="Babakan">Babakan</option>
                                                <option selected value="{{ $getKomunitas['kecamatan'] }}">
                                                    {{ $getKomunitas['kecamatan'] }}</option>
                                                <option value="Cantigi">Cantigi</option>
                                                <option value="Cikedung">Cikedung</option>
                                                <option value="Gantar">Gantar</option>
                                                <option value="Haurgeulis">Haurgeulis</option>
                                                <option value="Indramayu">Indramayu</option>
                                                <option value="Juntinyuat">Juntinyuat</option>
                                                <option value="Jatibarang">Jatibarang</option>
                                                <option value="Krangkeng">Krangkeng</option>
                                                <option value="Balongan">Balongan</option>
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
                                        {{-- <label for="kecamatan" class="col-form-label"
                                            style="font-size: 14px;">Kecamatan</label>
                                        <input class="form-control mb-2" name="kecamatan" type="text" id="kecamatan"
                                            value="{{ old('kecamatan', $getKomunitas['kecamatan']) }}">
                                        @error('kecamatan')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror --}}
                                        <label for="desa" class="col-form-label"
                                            style="font-size: 14px;">Kelurahan/Desa</label>
                                        <div class="mb-2">
                                            <select class="form-control" name="desa" type="text" id="desa">
                                                <option value="Balongan">Balongan</option>
                                                <option selected value="{{ $getKomunitas['desa'] }}">
                                                    {{ $getKomunitas['desa'] }}</option>
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
                                        {{-- <label for="desa" class="col-form-label"
                                            style="font-size: 14px;">Kelurahan/Desa</label>
                                        <input class="form-control mb-2" name="desa" type="text" id="desa"
                                            value="{{ old('desa', $getKomunitas['desa']) }}">
                                        @error('desa')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror --}}

                                        <label for="kode_pos" class="col-form-label" style="font-size: 14px;">Kode
                                            Pos</label>
                                        <input class="form-control mb-3" name="kode_pos" type="text" id="kode_pos"
                                            value="{{ old('kode_pos', $getKomunitas['kode_pos']) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        @error('kode_pos')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success px-4 float-right">SIMPAN</button>
                                    <button type="button" class="btn btn-danger px-4 float-right mr-2"
                                        onclick="window.location.href = '{{ url('/dashboard/komunitas/' . $getKomunitas->id) }}'">KEMBALI</button>
                                    {{-- <button type="button" class="btn btn-danger px-4 float-right mr-2"
                                        onclick="window.location.href = '{{ route('komunitas.index', ['komunitas_id' => $getKomunitas['id']]) }}'">KEMBALI</button> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
