@extends('dashboard.layouts.main')
@section('title', 'Kelola User')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Kelola Lainnya</li>
                        <li class="breadcrumb-item active">Kelola Pengguna</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mt-4 d-inline-block"><b>Daftar Data Pengguna</b></h3>
                        <hr class="border">
                        <table id="tableKelolaKomunitas" class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Status Pengguna</th>
                                    <th>Alamat Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>NIK</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->nik }}</td>
                                        <td class="text-center">
                                            {{-- <a href="#">
                                                <i class="fa fa-eye mr-2" style="font-size: 20px"></i>
                                            </a> --}}
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('kelolaPengguna.edit', $data->id) }}" class="mr-2">
                                                    <i class="fa fa-edit" style="font-size: 20px;"></i>
                                                </a>
                                                <form action="{{ url('dashboard/kelolaPengguna/' . $data->id) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-link text-danger"
                                                        style="font-size: 20px;">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            {{-- <a href="{{ route('kelolaPengguna.destroy', $data->id) }}">
                                            </a> --}}
                                            {{-- <a href="{{ url('dashboard/KelolaPengguna/destroy/' . $data->id) }}">
                                                <i class="fa fa-trash-o text-danger mr-2" style="font-size: 20px"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                @empty
                                    <p>Data User Kosong</p>
                                @endforelse
                                {{-- @forelse ($komunitas as $data)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/' . $data['logo_komunitas']) }}"
                                                alt="logo komunitas" widht="50" height="50">
                                        </td>
                                        <td>{{ $data->nama_komunitas }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->alamat_komunitas }}</td>
                                        <td>{{ $data->no_tlp }}</td>

                                    </tr>
                                @empty
                                    <p>Data Komunitas Kosong</p>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tableKelolaKomunitas').DataTable({
                searching: true
            });
        });
    </script>
@endsection
