@extends('dashboard.layouts.main')
@section('title', 'Profil Keluarga')
@section('content')
    <div class="card bg-transparent shadow-none ">
        <div class="card-body ">
            <h4 class="text-success mt-0">Profil Keluarga</h4>
            <div class="card ">
                <div class="card-body">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <i class="dripicons-view-list mr-2" style="font-size: 17px"></i>
                                <h4 class="mt-0 d-inline-block">List Anggota Keluarga</h4>
                            </div>
                            <div>
                                <a href="{{ route('profil-keluarga.create') }}" class="btn btn-primary">Tambah Data
                                    Keluarga</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 border">
                            <thead class="thead-default">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Anggota Keluarga</th>
                                    <th>Hubungan Keluarga</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telepon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nokeluarga = 1;
                                @endphp
                                @forelse ($profilKeluarga as $data)
                                    @if ($data->user_id === auth()->user()->id)
                                        <tr>
                                            <th>{{ $nokeluarga++ }}</th>
                                            <td>{{ $data['nama_anggota_keluarga'] }}</td>
                                            <td>{{ $data['hubungan_keluarga'] }}</td>
                                            <td>{{ $data['jenis_kelamin'] === 'L' ? 'Laki-Laki' : ($data['jenis_kelamin'] === 'P' ? 'Perempuan' : '') }}
                                            </td>
                                            <td>{{ $data['phone'] }}</td>
                                            <td>
                                                <div class="">
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#myModal{{ $data['id'] }}">
                                                        <i class="fa fa-edit mr-2" style="font-size: 20px"></i>
                                                    </a>
                                                    <a href="{{ route('profilkeluarga.destroy', $data->id) }}"><i
                                                            class="fa fa-trash-o text-danger"
                                                            style="font-size: 20px"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif


                                    <!-- modal data edit data keluarga -->
                                    <div id="myModal{{ $data['id'] }}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex justify-content-center">
                                                    <h4 class=" modal-title text-success" id="myModalLabel">Data Detail</h4>
                                                </div>
                                                <div class="modal-body m-3">
                                                    <form action="{{ route('profilKeluarga.update', $data['id']) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="nama_anggota_keluarga" class="col-form-label"
                                                                style="font-size: 14px;">Nama
                                                                Anggota
                                                                Keluarga</label>
                                                            <div class="mb-2">
                                                                <input class="form-control" name="nama_anggota_keluarga"
                                                                    type="text" id="nama_anggota_keluarga"
                                                                    value="{{ old('nama_anggota_keluarga', $data['nama_anggota_keluarga']) }}"
                                                                    placeholder="Masukan Nama Anggota Keluarga"
                                                                    pattern="[^0-9]+" required
                                                                    oninput="this.value=this.value.replace(/[0-9]/g,'');">
                                                                @error('nama_anggota_keluarga')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <label for="hubungan_keluarga" class="col-form-label"
                                                                style="font-size: 14px;">Hubungan
                                                                Keluarga</label>
                                                            <div class="mb-2">
                                                                <select class="form-control" name="hubungan_keluarga"
                                                                    type="text" id="hubungan_keluarga">
                                                                    @if ($data['hubungan_keluarga'] === 'Suami')
                                                                        <option selected
                                                                            value="{{ $data['hubungan_keluarga'] }}">Suami
                                                                        </option>
                                                                    @else
                                                                        <option value="Suami">Suami</option>
                                                                    @endif
                                                                    @if ($data['hubungan_keluarga'] === 'Istri')
                                                                        <option selected
                                                                            value="{{ $data['hubungan_keluarga'] }}">Istri
                                                                        </option>
                                                                    @else
                                                                        <option value="Istri">Istri</option>
                                                                    @endif
                                                                    @if ($data['hubungan_keluarga'] === 'Anak')
                                                                        <option selected
                                                                            value="{{ $data['hubungan_keluarga'] }}">Anak
                                                                        </option>
                                                                    @else
                                                                        <option value="Anak">Anak</option>
                                                                    @endif
                                                                    @if ($data['hubungan_keluarga'] === 'Lainnya')
                                                                        <option selected
                                                                            value="{{ $data['hubungan_keluarga'] }}">
                                                                            Lainnya
                                                                        </option>
                                                                    @else
                                                                        <option value="Lainnya">Lainnya</option>
                                                                    @endif
                                                                </select>
                                                                @error('hubungan_keluarga')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-6">
                                                                    <label for="jenis_kelamin" class="col-form-label"
                                                                        style="font-size: 14px;">Jenis
                                                                        Kelamin</label>
                                                                    <select class="form-control" name="jenis_kelamin"
                                                                        type="text" id="jenis_kelamin">
                                                                        @if ($data['jenis_kelamin'] === 'L')
                                                                            <option selected
                                                                                value="{{ $data['jenis_kelamin'] }}">
                                                                                Laki-Laki
                                                                            </option>
                                                                        @else
                                                                            <option value="L">Laki-Laki</option>
                                                                        @endif
                                                                        @if ($data['jenis_kelamin'] === 'P')
                                                                            <option selected
                                                                                value="{{ $data['jenis_kelamin'] }}">
                                                                                Perempuan
                                                                            </option>
                                                                        @else
                                                                            <option value="P">Perempuan</option>
                                                                        @endif
                                                                    </select>
                                                                    @error('jenis_kelamin')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-6">
                                                                    <label for="tanggal_lahir" class="col-form-label"
                                                                        style="font-size: 14px;">Tanggal
                                                                        Lahir</label>
                                                                    <input class="form-control" name="tanggal_lahir"
                                                                        type="date" id="tanggal_lahir"
                                                                        value="{{ old('tanggal_lahir', $data['tanggal_lahir']) }}">
                                                                    @error('tanggal_lahir')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <label for="agama" class="col-form-label"
                                                                style="font-size: 14px;">Agama</label>
                                                            <div class="mb-2">
                                                                <select class="form-control" name="agama" type="text"
                                                                    id="agama">
                                                                    @if ($data['agama'] === 'Islam')
                                                                        <option selected value="{{ $data['agama'] }}">
                                                                            Islam
                                                                        </option>
                                                                    @else
                                                                        <option value="Islam">Islam</option>
                                                                    @endif
                                                                    @if ($data['agama'] === 'Kristen')
                                                                        <option selected value="{{ $data['agama'] }}">
                                                                            Kristen
                                                                        </option>
                                                                    @else
                                                                        <option value="Kristen">Kristen</option>
                                                                    @endif
                                                                    @if ($data['agama'] === 'Katolik')
                                                                        <option selected value="{{ $data['agama'] }}">
                                                                            Katolik
                                                                        </option>
                                                                    @else
                                                                        <option value="Katolik">Katolik</option>
                                                                    @endif
                                                                    @if ($data['agama'] === 'Hindu')
                                                                        <option selected value="{{ $data['agama'] }}">
                                                                            Hindu
                                                                        </option>
                                                                    @else
                                                                        <option value="Hindu">Hindu</option>
                                                                    @endif
                                                                    @if ($data['agama'] === 'Budha')
                                                                        <option selected value="{{ $data['agama'] }}">
                                                                            Budha
                                                                        </option>
                                                                    @else
                                                                        <option value="Budha">Budha</option>
                                                                    @endif
                                                                    @if ($data['agama'] === 'Konghucu')
                                                                        <option selected value="{{ $data['agama'] }}">
                                                                            Konghucu
                                                                        </option>
                                                                    @else
                                                                        <option value="Konghucu">Konghucu</option>
                                                                    @endif
                                                                </select>
                                                                @error('agama')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <label for="pekerjaan" class="col-form-label"
                                                                style="font-size: 14px;">Pekerjaan</label>
                                                            <div class="mb-2">
                                                                <input class="form-control" name="pekerjaan"
                                                                    type="text" id="pekerjaan"
                                                                    value="{{ old('pekerjaan', $data['pekerjaan']) }}"
                                                                    pattern="[^0-9]+" required
                                                                    oninput="this.value=this.value.replace(/[0-9]/g,'');"
                                                                    placeholder="Masukan Pekerjaan Anda">
                                                                @error('pekerjaan')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <label for="phone" class="col-form-label"
                                                                style="font-size: 14px;">Nomor
                                                                Telepon</label>
                                                            <div class="mb-2">
                                                                <input class="form-control" name="phone" type="text"
                                                                    id="phone"
                                                                    value="{{ old('phone', $data['phone']) }}"
                                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                                    placeholder="Masukan Nomor Telepon Anda" required>
                                                                @error('phone')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <label for="email" class="col-form-label"
                                                                style="font-size: 14px;">Email</label>
                                                            <div class="mb-2">
                                                                <input class="form-control" name="email" type="email"
                                                                    id="email"
                                                                    value="{{ old('email', $data['email']) }}" required>
                                                                @error('email')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        {{-- <div class="modal-footer"> --}}
                                                        <button type="submit"
                                                            class="btn btn-primary float-right">SIMPAN</button>
                                                        <button type="button"
                                                            class="btn btn-danger waves-effect px-3 mr-2 float-right"
                                                            data-dismiss="modal">BATAL</button>
                                                        {{-- </div> --}}
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.profil_keluarga.popup')
@endsection
