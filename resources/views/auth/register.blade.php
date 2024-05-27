@extends('layouts.auth')
@section('title', 'Sign Up')
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
                                <h3 class="font-weight-bold">Daftar</h3>
                                <p class="mb-4 text-light">Daftar sekarang untuk menjadi Kluwarga</p>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group text-light">
                                    <label for="name">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" required
                                        autofocus>
                                    @error('name')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-light">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" required
                                        autocomplete="username">
                                    @error('email')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-light">
                                    <label for="phone">No. Handphone<span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control" id="phone" maxlength="15"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>
                                    @error('phone')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group text-light">
                                    <label for="password">Input Password<span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" required
                                        autofocus>
                                    @error('password')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-light">
                                    <label for="retry_password">Retry Input Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="retry_password" class="form-control" id="retry_password"
                                        required autofocus>
                                    @error('retry_password')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="btn-small text-white btn-success col-3 float-right">Daftar</button>
                                <br>
                                <hr class="bg-light">
                                <p class="text-center font-weight-bold">Sudah punya akun? <a class="text-success"
                                        href="{{ route('login') }}">Masuk
                                        sekarang</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
