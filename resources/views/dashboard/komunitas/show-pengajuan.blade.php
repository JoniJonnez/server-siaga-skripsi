@extends('dashboard.layouts.main')
@section('title', 'Approval Komunitas')
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
                        <li class="breadcrumb-item">
                            <a href="{{ route('wargaKomunitas.indexWarga') }}">Pengaturan Warga</a>
                        </li>
                        <li class="breadcrumb-item active">Approval Komunitas</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status_hunian" class="col-form-label">Beri persetujuan bergabung ke
                                komunitas</label>
                            <div class="button-items">
                                @if ($rumah['status_komunitas'] === 'menunggu' || $rumah['status_komunitas'] === null)
                                    <form method="POST"
                                        action="{{ route('pengajuan.updateStatus', ['status_updatate' => 'diterima', 'ids' => $rumah['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success"
                                            onclick="toggleActive(this, 'diterima')">DIterima</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('pengajuan.updateStatus', ['status_updatate' => 'ditolak', 'ids' => $rumah['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="toggleActive(this, 'ditolak')">Ditolak</button>
                                    </form>
                                @elseif($rumah['status_komunitas'] === 'diterima')
                                    <form method="POST"
                                        action="{{ route('pengajuan.updateStatus', ['status_updatate' => 'menunggu', 'ids' => $rumah['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning"
                                            onclick="toggleActive(this, 'menunggu')">Menunggu Konfirmasi</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('pengajuan.updateStatus', ['status_updatate' => 'ditolak', 'ids' => $rumah['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger"
                                            onclick="toggleActive(this, 'ditolak')">Ditolak</button>
                                    </form>
                                @elseif($rumah['status_komunitas'] === 'ditolak')
                                    <form method="POST"
                                        action="{{ route('pengajuan.updateStatus', ['status_updatate' => 'diterima', 'ids' => $rumah['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success"
                                            onclick="toggleActive(this, 'diterima')">DIterima</button>
                                    </form>
                                    <form method="POST"
                                        action="{{ route('pengajuan.updateStatus', ['status_updatate' => 'menunggu', 'ids' => $rumah['id']]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-warning"
                                            onclick="toggleActive(this, 'menunggu')">Menunggu Konfirmasi</button>
                                    </form>
                                @endif
                            </div>
                            <div>
                                <label for="status_komunitas" class="col-form-label" style="font-size: 14px;">Status
                                    Pengajuan
                                    Komunitas</label>
                                @if ($rumah->status_komunitas === 'menunggu' || $rumah->status_komunitas === null)
                                    <p style="font-size: 14px; color: rgb(0, 0, 0);">Menunggu Konfirmasi Bergabung Komunitas
                                    </p>
                                @elseif($rumah->status_komunitas === 'diterima')
                                    <p style="font-size: 14px; color: rgb(0, 0, 0);">Diterima Bergabung Komunitas</p>
                                @elseif($rumah->status_komunitas === 'ditolak')
                                    <p style="font-size: 14px; color: rgb(0, 0, 0);">Ditolak Bergabung Komunitas</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="status_hunian" class="col-form-label">Bukti Ingin Bergabung</label>
                        <div>
                            <a href="{{ asset('storage/' . $rumah['foto']) }}" download>
                                <img src="{{ asset('storage/' . $rumah['foto']) }}" alt="Bukti Ingin Bergabung"
                                    widht="150" height="150">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="name" class="col-form-label" style="font-size: 14px;">Nama yang ingin
                            bergabung</label>
                        <input class="form-control form-control-sm mb-1" name="name" type="text" id="name"
                            value="{{ $rumah->user->name }}" readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="kode_rumah" class="col-form-label" style="font-size: 14px;">Kode Rumah</label>
                        <input class="form-control form-control-sm mb-1" name="kode_rumah" type="text" id="kode_rumah"
                            value="{{ $rumah->kode_rumah }}" readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="jalan" class="col-form-label" style="font-size: 14px;">Jalan</label>
                        <input class="form-control form-control-sm mb-1" name="jalan" type="text" id="jalan"
                            value="{{ $rumah->jalan }}" readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="rt" class="col-form-label" style="font-size: 14px;">RT</label>
                        <input class="form-control form-control-sm mb-1" name="rt" type="text" id="rt"
                            value="{{ $rumah->rt }}" readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="rw" class="col-form-label" style="font-size: 14px;">RW</label>
                        <input class="form-control form-control-sm mb-1" name="rw" type="text" id="rw"
                            value="{{ $rumah->rw }}" readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="blok" class="col-form-label" style="font-size: 14px;">Blok</label>
                        <input class="form-control form-control-sm mb-1" name="blok" type="text" id="blok"
                            value="{{ $rumah->blok }}" readonly style="background-color: white;">
                    </div>
                    <div class="mb-3">
                        <label for="status_hunian" class="col-form-label" style="font-size: 14px;">Status Hunian</label>
                        <input class="form-control form-control-sm mb-1" name="status_hunian" type="text"
                            id="status_hunian" value="{{ $rumah->status_hunian }}" readonly
                            style="background-color: white;">
                    </div>
                    <a href="javascript:void(0);" class="text-success" data-toggle="modal"
                        data-target="#detailPengguna{{ $rumah->id }}"><i>Detail Pengguna</i></a>
                </div>
                <button type="button" class="btn btn-danger btn-sm col-1 float-right mr-2 mb-3"
                    onclick="window.location.href = '{{ route('Approval.index', ['komunitas_id' => $getKomunitas['id']]) }}'">Kembali</button>
            </div>
        </div>
    </div>

    <!-- Modal detail Pengguna -->
    <div class="modal fade" id="detailPengguna{{ $rumah->id }}" tabindex="-1" role="dialog"
        aria-labelledby="detailPenggunaTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ml-auto text-success" id="exampleModalLongTitle">Detail Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ml-3 mb-3">
                    <div class="row">
                        <div class="col-9">
                            <div>
                                <label for="name" class="col-form-label" style="font-size: 14px;">Nama yang ingin
                                    bergabung</label>
                                <input class="form-control form-control-sm mb-1" name="name" type="text"
                                    id="name" value="{{ $rumah->user->name }}" readonly
                                    style="background-color: white;">
                            </div>
                            <div>
                                <label for="nik" class="col-form-label" style="font-size: 14px;">Nomor NIK</label>
                                <input class="form-control form-control-sm mb-1" name="nik" type="text"
                                    id="nik" value="{{ $rumah->user->nik }}" readonly
                                    style="background-color: white;">
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="col-form-label" style="font-size: 14px;">Jenis
                                    Kelamin</label>
                                @if ($rumah->user->jenis_kelamin === 'L')
                                    <input class="form-control form-control-sm mb-1" name="jenis_kelamin" type="text"
                                        id="jenis_kelamin" value="Laki-laki" readonly style="background-color: white;">
                                @elseif($rumah->user->jenis_kelamin === 'P')
                                    <input class="form-control form-control-sm mb-1" name="jenis_kelamin" type="text"
                                        id="jenis_kelamin" value="Perempuan" readonly style="background-color: white;">
                                @endif
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="foto" class="col-form-label">Foto Profil</label>
                            <div>
                                @if ($rumah->user['foto'])
                                    <img src="{{ asset('storage/' . $rumah->user['foto']) }}" alt="Bukti Ingin Bergabung"
                                        width="150" height="150">
                                @else
                                    <img src="{{ asset('assets/images/users/profil.png') }}" alt="Profil Kosong"
                                        width="150" height="150">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="nik" class="col-form-label" style="font-size: 14px;">Tempat dan Tgl
                            Lahir</label>
                        <input class="form-control form-control-sm mb-1" name="nik" type="text" id="nik"
                            value="{{ $rumah->user->tempat_lahir }}, {{ \Carbon\Carbon::parse($rumah->user->tanggal_lahir)->format('d F Y') }}"
                            readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="alamat" class="col-form-label" style="font-size: 14px;">Alamat</label>
                        <input class="form-control form-control-sm mb-1" name="alamat" type="text" id="alamat"
                            value="{{ $rumah->user->alamat }}" readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="phone" class="col-form-label" style="font-size: 14px;">Nomor Telepon</label>
                        <input class="form-control form-control-sm mb-1" name="phone" type="text" id="phone"
                            value="{{ $rumah->user->phone }}" readonly style="background-color: white;">
                    </div>
                    <div>
                        <label for="email" class="col-form-label" style="font-size: 14px;">Email</label>
                        <input class="form-control form-control-sm mb-1" name="email" type="text" id="email"
                            value="{{ $rumah->user->email }}" readonly style="background-color: white;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleActive(button) {
            button.classList.toggle("active");
        }
    </script>
@endsection
