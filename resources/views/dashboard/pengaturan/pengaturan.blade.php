@extends('dashboard.layouts.main')
@section('title', 'Pengaturan Komunitas')
@section('content')
    <div class="card bg-transparent shadow-none">
        <div class="card-body">
            <h4 class="text-success mt-0">Pengaturan Pengguna</h4>
            <div class="card ">
                <div class="card-body col-11">
                    @if ($message = session('success-informasi'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert"
                            id="success-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="mdi mdi-check-circle mr-2"></i>{{ $message }}
                        </div>
                    @endif

                    <h5>Informasi Akun</h5>
                    <form action="{{ route('profile.update') }}" id="form-update-akun" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input class="form-control" type="email" id="email" name="email"
                                value="{{ old('email', auth()->user()->email) }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="col-form-label">No. Handphone</label>
                            <input class="form-control" type="tel" id="phone" name="phone"
                                value="{{ old('phone', auth()->user()->phone) }}"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger btn-sm col-1 mr-1"
                                onclick="window.location.href = '{{ route('pengaturan.index') }}'">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm col-1"
                                onclick="$('#form-update-akun').submit();">SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card ">
                <div class="card-body col-11">
                    @if ($message = session('success-password'))
                        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center"
                            role="alert" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <i class="mdi mdi-check-circle mr-2"></i>{{ $message }}
                        </div>
                    @endif


                    <h5>Kata Sandi</h5>
                    <form action="{{ route('password.update') }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="current_password" class="col-form-label">Kata Sandi Lama</label>
                            <input class="form-control" type="password" id="current_password" name="current_password">
                            @if ($errors->updatePassword->get('current_password'))
                                <div class="text-danger">{{ $errors->updatePassword->first('current_password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">Kata Sandi Baru</label>
                            <input class="form-control" type="password" id="password" name="password">
                            @if ($errors->updatePassword->get('password'))
                                <div class="text-danger">{{ $errors->updatePassword->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="col-form-label">Konfirmasi Kata Sandi</label>
                            <input class="form-control" type="password" id="password_confirmation"
                                name="password_confirmation">
                            @if ($errors->updatePassword->get('password_confirmation'))
                                <div class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <a href="{{ route('pengaturan.index') }}" class="btn btn-danger btn-sm mr-1 col-1">Batal</a>
                            <button type="submit" class="btn btn-success btn-sm col-1">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    // Menampilkan alert setelah halaman selesai dimuat
    document.addEventListener('DOMContentLoaded', function() {
        var alertElement = document.getElementById('success-alert');
        alertElement.style.display = 'block';
    });
</script>
