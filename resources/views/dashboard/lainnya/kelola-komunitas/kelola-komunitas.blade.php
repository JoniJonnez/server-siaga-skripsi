@extends('dashboard.layouts.main')
@section('title', 'Kelola Komunitas')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Kelola Lainnya</li>
                        <li class="breadcrumb-item active">Kelola Komunitas</li>
                    </ol>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mt-4 d-inline-block"><b>Daftar Data Komunitas</b></h3>
                        <hr class="border">
                        <table id="tableKelolaKomunitas" class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Profil Komunitas</th>
                                    <th>Nama Komunitas</th>
                                    <th>Pemilik Komunitas</th>
                                    <th>Alamat Komunitas</th>
                                    <th>Nomor Telepon</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($komunitas as $data)
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
                                        <td class="text-center d-flex align-items-center">
                                            <a href="{{ route('kelolaKomunitas.show', $data->id) }}">
                                                <i class="fa fa-eye mr-2" style="font-size: 20px;"></i>
                                            </a>
                                            <a href="{{ route('kelolaKomunitas.edit', $data->id) }}" class="ml-2">
                                                <i class="fa fa-edit" style="font-size: 20px;"></i>
                                            </a>
                                            <form action="{{ route('kelolaKomunitas.destroy', $data->id) }}" method="POST"
                                                class="ml-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger"
                                                    style="font-size: 20px;">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p>Data Komunitas Kosong</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tableKelolaKomunitas')
                .DataTable({
                    searching: true
                });
        });
    </script>
@endsection
