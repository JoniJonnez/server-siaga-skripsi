@extends('layouts.auth')
@section('title', 'Sign In')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-7 my-auto">
                    <h3 class="font-weight-bold text-light">KLUWARGA</h3>
                    <P class="font-weight-bold text-success">Kesatuan tetangga, kebersamaan terjaga.</P>
                    <P class="font-weight-bold">Dengan Kluwarga, Komunitas menjadi lebih mudah</P>
                </div>
                <div class="col-md-5 order-md-2 rounded"
                    style="background: rgba(61, 61, 61, 0.5); padding:25px; backdrop-filter: blur(10px); ">
                    <div class="row justify-content-center">
                        <div class="col-11">
                            <div class="mb-4 text-light">
                                <h3 class="font-weight-bold">Masuk</h3>
                                <p class="mb-4 text-light">Masuk menggunakan akun keluarga yang sudah terdaftar</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group text-light">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" required
                                        autofocus autocomplete="username" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 text-light">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required
                                        autocomplete="current-password">
                                    @error('password')
                                        <span class="text-white" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0" for="remember_me"><span
                                            class="caption">Ingat
                                            Saya</span>
                                        <input type="checkbox" name="remember" id="remember_me" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    {{-- @if (Route::has('password.request'))
                                        <span class="ml-auto text-light">
                                            <a href="{{ route('password.request') }}" class="forgot-pass">Lupa Password</a>
                                        </span>
                                    @endif --}}
                                </div>
                                <button type="submit"
                                    class="btn-small text-white btn-success col-3 float-right">Masuk</button>
                                <br>
                                <hr class="bg-light">
                                <p class="text-center font-weight-bold">Belum punya akun? <a class="text-success"
                                        href="{{ route('register') }}">Daftar
                                        sekarang</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
