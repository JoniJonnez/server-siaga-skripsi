@extends('dashboard.layouts.main')
@section('title', 'Profil Pengguna')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="card-body">
            <h4 class="text-success mt-0">Profil Pengguna</h4>
            <div class="row">
                <div class="col-9">
                    <form action="{{ route('pengguna.update', auth()->user()->id) }}" method="POST" id="form-update-profile">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name" class="col-form-label" style="font-size: 14px;">Nama*</label>
                                    <div class="mb-2">
                                        <input pattern="[^0-9]+" required
                                            oninput="this.value=this.value.replace(/[0-9]/g,'');" class="form-control"
                                            type="text" id="name" name="name"
                                            value="{{ old('name', auth()->user()->name) }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label for="email" class="col-form-label" style="font-size: 14px;">Alamat
                                        Email*</label>
                                    <div class="mb-2">
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}" readonly>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label for="phone" class="col-form-label" style="font-size: 14px;">No.
                                        Handphone</label>
                                    <div class="mb-2">
                                        <input class="form-control" type="tel" id="phone" name="phone"
                                            value="{{ old('phone', auth()->user()->phone) }}" readonly>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label for="nik" class="col-form-label" style="font-size: 14px;">NIK*</label>
                                    <div class="mb-2">
                                        <input class="form-control" name="nik" type="text" id="nik"
                                            value="{{ old('nik', auth()->user()->nik) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        @error('nik')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="tempat_lahir" class="col-form-label" style="font-size: 14px;">Tempat
                                            Lahir</label>
                                        <input class="form-control" name="tempat_lahir" type="text" id="tempat_lahir"
                                            value="{{ old('tempat_lahir', auth()->user()->tempat_lahir) }}"
                                            pattern="[^0-9]+" required
                                            oninput="this.value=this.value.replace(/[0-9]/g,'');">
                                        @error('tempat_lahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="tanggal_lahir" class="col-form-label" style="font-size: 14px;">Tanggal
                                            Lahir</label>
                                        <input class="form-control" type="date"
                                            value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}"
                                            id="tanggal_lahir">
                                        @error('tanggal_lahir')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin" class="col-form-label" style="font-size: 14px;">Jenis
                                        Kelamin</label>
                                    <div class="mb-2">
                                        <select class="form-control" name="jenis_kelamin" type="text" id="jenis_kelamin">
                                            @if (auth()->user()->jenis_kelamin === 'L')
                                                <option selected value="L">Laki-laki</option>
                                            @else
                                                <option value="L">Laki-laki</option>
                                            @endif
                                            @if (auth()->user()->jenis_kelamin === 'P')
                                                <option selected value="P">Perempuan</option>
                                            @else
                                                <option value="P">Perempuan</option>
                                            @endif
                                        </select>
                                        @error('jenis_kelamin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label for="agama" class="col-form-label" style="font-size: 14px;">Agama</label>
                                    <div class="">
                                        <select class="form-control" name="agama" type="text" id="agama">
                                            @if (auth()->user()->agama === 'Islam')
                                                <option selected value="{{ auth()->user()->agama }}">Islam</option>
                                            @else
                                                <option value="Islam">Islam</option>
                                            @endif
                                            @if (auth()->user()->agama === 'Kristen')
                                                <option selected value="{{ auth()->user()->agama }}">Kristen</option>
                                            @else
                                                <option value="Kristen">Kristen</option>
                                            @endif
                                            @if (auth()->user()->agama === 'Katolik')
                                                <option selected value="{{ auth()->user()->agama }}">Katolik</option>
                                            @else
                                                <option value="Katolik">Katolik</option>
                                            @endif
                                            @if (auth()->user()->agama === 'Hindu')
                                                <option selected value="{{ auth()->user()->agama }}">Hindu</option>
                                            @else
                                                <option value="Hindu">Hindu</option>
                                            @endif
                                            @if (auth()->user()->agama === 'Budha')
                                                <option selected value="{{ auth()->user()->agama }}">Budha</option>
                                            @else
                                                <option value="Budha">Budha</option>
                                            @endif
                                            @if (auth()->user()->agama === 'Konghucu')
                                                <option selected value="{{ auth()->user()->agama }}">Konghucu</option>
                                            @else
                                                <option value="Konghucu">Konghucu</option>
                                            @endif
                                        </select>
                                        @error('agama')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4 class="">Alamat Lengkap</h4>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="alamat" class="col-form-label"
                                            style="font-size: 14px;">Alamat</label>
                                        <input class="form-control" name="alamat" type="text" id="alamat"
                                            value="{{ old('alamat', auth()->user()->alamat) }}">
                                        @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="rt" class="col-form-label" style="font-size: 14px;">RT</label>
                                        <input class="form-control" name="rt" type="text" id="rt"
                                            value="{{ old('rt', auth()->user()->rt) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        @error('rt')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="rw" class="col-form-label" style="font-size: 14px;">RW</label>
                                        <input class="form-control" name="rw" type="text" id="rw"
                                            value="{{ old('rw', auth()->user()->rw) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        @error('rw')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi" class="col-form-label"
                                        style="font-size: 14px;">Provinsi</label>
                                    <div class="mb-2">
                                        <select class="form-control" name="provinsi" type="text" id="provinsi">
                                            <option value="Aceh">Aceh</option>
                                            <option value="Bali">Bali</option>
                                            <option value="Bangka Belitung">Bangka Belitung</option>
                                            <option value="Banten">Banten</option>
                                            <option value="Bengkulu">Bengkulu</option>
                                            <option value="DKI Jakarta">DKI Jakarta</option>
                                            <option value="Gorontalo">Gorontalo</option>
                                            <option value="Jambi">Jambi</option>
                                            <option selected value="{{ auth()->user()->provinsi }}">
                                                {{ auth()->user()->provinsi }}
                                            </option>
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
                                            <option value="Jawa Barat">Jawa Barat</option>
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
                                            <option selected value="{{ auth()->user()->kota }}">
                                                {{ auth()->user()->kota }}
                                            </option>
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

                                    <label for="kecamatan" class="col-form-label"
                                        style="font-size: 14px;">Kecamatan</label>
                                    <div class="mb-2">
                                        <select class="form-control" name="kecamatan" type="text" id="kecamatan">
                                            <option value="Anjatan">Anjatan</option>
                                            <option value="Bongas">Bongas</option>
                                            <option value="Babakan">Babakan</option>
                                            <option selected value="{{ auth()->user()->kecamatan }}">
                                                {{ auth()->user()->kecamatan }}
                                            </option>
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

                                    <label for="desa" class="col-form-label"
                                        style="font-size: 14px;">Kelurahan/Desa</label>
                                    <div class="mb-2">
                                        <select class="form-control" name="desa" type="text" id="desa">
                                            <option value="Balongan">Balongan</option>
                                            <option selected value="{{ auth()->user()->desa }}">
                                                {{ auth()->user()->desa }}
                                            </option>
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

                                    <label for="kode_pos" class="col-form-label" style="font-size: 14px;">Kode
                                        Pos</label>
                                    <div class="">
                                        <input class="form-control" name="kode_pos" type="text" id="kode_pos"
                                            value="{{ old('kode_pos', auth()->user()->kode_pos) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        @error('kode_pos')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <H4>Kontak</H4>
                                <div class="form-group">
                                    <label for="email" class="col-form-label" style="font-size: 14px;">Alamat
                                        Email*</label>
                                    <div class="mb-2">
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}" readonly>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label for="phone" class="col-form-label" style="font-size: 14px;">No.
                                        Handphone</label>
                                    <div class="mb-2">
                                        <input class="form-control" type="tel" id="phone" name="phone"
                                            value="{{ old('phone', auth()->user()->phone) }}" readonly>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <label for="no_tlp_rumah" class="col-form-label" style="font-size: 14px;">Nomor
                                        Telepon Rumah</label>
                                    <div class="">
                                        <input class="form-control" type="tel" id="no_tlp_rumah" name="no_tlp_rumah"
                                            value="{{ old('no_tlp_rumah', auth()->user()->no_tlp_rumah) }}"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                        @error('no_tlp_rumah')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div style="position: absolute; left:0;">
                            <button type="submit" class="btn btn-success  px-4 float-right"
                                onclick="$('#form-update-profile').submit();">SIMPAN</button>
                            <button type="button" class="btn btn-primary px-4 float-left mr-3"
                                onclick="window.location.href = '{{ route('pengaturan.index') }}';">EDIT PASSWORD</button>
                        </div>
                    </form>
                </div>
                <div class="col-3 text-center">
                    <div class="mb-2">
                        <h4>Foto Profil</h4>
                        @if (auth()->user()->foto === null)
                            <img src="{{ asset('assets/images/users/profil.png') }}" alt="{{ auth()->user()->name }}"
                                class="rounded-circle thumb-xl profile-image">
                        @else
                            <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="{{ auth()->user()->name }}"
                                class="rounded-circle img-thumbnail thumb-xl profile-image">
                        @endif
                    </div>
                    <p class="text-muted font-12">Silahkan untuk menggunakan foto profil dengan format .png .jpg .tiff
                    </p>
                    <div class="button-items">
                        <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="foto" id="photo" class="form-control-file d-none"
                                    accept=".jpeg,.jpg,.png,.jfif">
                            </div>
                            <button type="submit" class="btn btn-sm col-4 btn-info">Simpan</button>
                            <a href="{{ route('profile.delete-photo') }}"
                                class="btn btn-sm col-4 btn-secondary">Hapus</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
