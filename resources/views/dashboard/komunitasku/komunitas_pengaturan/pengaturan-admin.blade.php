@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Komunitas')
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
                        <li class="breadcrumb-item active">Pengatuan komunitas</li>
                    </ol>
                </div>
                <h4 class="page-title">Pengaturan Komunitas</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    {{-- pengaturan 1 --}}
                    <div class="ml-3">
                        <p style="margin: 0;">1.&nbsp;&nbsp;Pengaturan akeses bergabung komunitas</p>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox1" data-pengaturan="Pengaturan akeses bergabung komunitas"
                                name="pengaturan1" value="dibuka ( boleh siapa aja yang mau bergabung)" class="pengaturan1"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Pengaturan akeses bergabung komunitas'])) {{ $data['Pengaturan akeses bergabung komunitas'] === 'dibuka ( boleh siapa aja yang mau bergabung)' ? 'checked' : '' }} @endif>
                            <label for="checkbox1">dibuka ( boleh siapa aja yang mau bergabung)</label>
                        </div>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox2" data-pengaturan="Pengaturan akeses bergabung komunitas"
                                name="pengaturan1" value="hanya bisa di undang atau sceen QR Code" class="pengaturan1"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Pengaturan akeses bergabung komunitas'])) {{ $data['Pengaturan akeses bergabung komunitas'] === 'hanya bisa di undang atau sceen QR Code' ? 'checked' : '' }} @endif>
                            <label for="checkbox2">hanya bisa di undang atau sceen QR Code</label>
                        </div>
                        <div class="ml-3 mb-2">
                            <input type="checkbox" id="checkbox3" data-pengaturan="Pengaturan akeses bergabung komunitas"
                                name="pengaturan1" value="ditutup (tidak ada yang bisa bergabung)" class="pengaturan1"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Pengaturan akeses bergabung komunitas'])) {{ $data['Pengaturan akeses bergabung komunitas'] === 'ditutup (tidak ada yang bisa bergabung)' ? 'checked' : '' }} @endif>
                            <label for="checkbox3">ditutup (tidak ada yang bisa bergabung)</label>
                        </div>
                    </div>

                    {{-- pengaturan 2 --}}
                    <div class="ml-3">
                        <p style="margin: 0;">2.&nbsp;&nbsp;Yang boleh melihat profil komunitas</p>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox4" data-pengaturan="Yang boleh melihat profil komunitas"
                                name="pengaturan2" value="Semua Pengguna" class="pengaturan2"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil komunitas'])) {{ $data['Yang boleh melihat profil komunitas'] === 'Semua Pengguna' ? 'checked' : '' }} @endif>
                            <label for="checkbox4">Semua Pengguna</label>
                        </div>
                        <div class="ml-3 mb-2">
                            <input type="checkbox" id="checkbox15" data-pengaturan="Yang boleh melihat profil komunitas"
                                name="pengaturan2" value="Hanya warga komunitas saja" class="pengaturan2"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Yang boleh melihat profil komunitas'])) {{ $data['Yang boleh melihat profil komunitas'] === 'Hanya warga komunitas saja' ? 'checked' : '' }} @endif>
                            <label for="checkbox15">Hanya warga komunitas saja</label>
                        </div>
                    </div>

                    {{-- pengaturan 3 --}}
                    <div class="ml-3">
                        <p style="margin: 0;">3.&nbsp;&nbsp;Pengaturan kepengurusan penentuan kepengurusan</p>
                        <div class="ml-3">
                            <input type="checkbox" id="checkbox6"
                                data-pengaturan="Pengaturan kepengurusan penentuan kepengurusan" name="pengaturan3"
                                value="bisa di atur sesuai dengan level pengurusnya" class="pengaturan3"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Pengaturan kepengurusan penentuan kepengurusan'])) {{ $data['Pengaturan kepengurusan penentuan kepengurusan'] === 'bisa di atur sesuai dengan level pengurusnya' ? 'checked' : '' }} @endif>
                            <label for="checkbox6">bisa di atur sesuai dengan level pengurusnya</label>
                        </div>
                        <div class="ml-3 mb-2">
                            <input type="checkbox" id="checkbox7"
                                data-pengaturan="Pengaturan kepengurusan penentuan kepengurusan" name="pengaturan3"
                                value="hanya pembuat atau ketua yang dapat mengatur semua kepengurusan" class="pengaturan3"
                                style="width: 15px; height: 15px;"
                                @if (isset($data['Pengaturan kepengurusan penentuan kepengurusan'])) {{ $data['Pengaturan kepengurusan penentuan kepengurusan'] === 'hanya pembuat atau ketua yang dapat mengatur semua kepengurusan' ? 'checked' : '' }} @endif>
                            <label for="checkbox7">hanya pembuat atau ketua yang dapat mengatur semua kepengurusan</label>
                        </div>
                    </div>

                    <div>
                        <span data-repeater-delete="" class="btn btn-danger btn-sm col-1 mr-2"
                            onclick="window.location.href = '{{ route('komunitas.index') }}'">Kembali</span>
                        <button type="submit" class="btn btn-success btn-sm col-1"
                            onclick="submitPengaturan()">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
