@extends('layouts.main')
@section('content')
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="main-header-text animated fadeIn">
                    <div class="col-md-6">
                        <h1 class="wow  bounceInLeft animated">KLUWARGA</h1>
                        <p class="wow  bounceInLeft animated">Kesatuan tetangga, kebersamaan terjaga<br> Dengan
                            Kluwarga, Komunitas menjadi lebih mudah</p>
                            <button type="button" class="btn btn-success getbtn wow bounceInLeft animated"
                            onclick="window.location.href='/carikomunitas'"
                            style=" margin-top:20px; font-size: 20px;">Cari Komunitas</button>
                    </div>

                    <div class="col-md-6">
                        <img src="{{ asset('assets/assets-landingpage/img/location.png') }}" alt="header-img"
                            class="wow slideInUp animated" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="about">
        <div class="about bg-danger">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-lg-6">
                        <div class="about-text wow  bounceInLeft animated">
                            <h2>Apa itu Kluwarga?</h2>
                            <p style="text-align: justify;">Aplikasi Kluwarga memudahkan pengelolaan lingkungan bertetangga,
                                khususnya terkait
                                dengan data warga, iuran, administrasi, dan berbagai informasi</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 ">
                        <div class="about-img wow bounceInRight animated d-flex justify-content-end">
                            <img src="{{ asset('assets/assets-landingpage/images/Landing1.png') }}" alt="Apa-itu-kluwarga"
                                style="width: 80%; height: auto; float: right;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    <section id="about">
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-lg-6">
                        <div class=" about-img wow bounceInLeft animated d-flex align-items-center" style="height: 100%;">
                            <img src="{{ asset('assets/assets-landingpage/images/Landing2.png') }}" alt="Apa-itu-kluwarga"
                                style="width: 80%; height: auto;">
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <div class="about-text wow bounceInRight animated">
                            <div class="d-flex justify-content-start">
                                <h2>Kelebihan Dari Kluwarga?</h2>
                                <p style="text-align: justify;">Aplikasi Kluwarga membantu meningkatkan efisiensi
                                    pengelolaan lingkungan bertetangga
                                    dengan menyediakan platform terpadu untuk mengatur dan mengelola data warga, iuran, dan
                                    administrasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- news -->
    <section id="blog">
        <div class="news">
            <div class="container">
                <div class="keunggulan text-center">
                    <h2>Keunggulan dari aplikasi Kluwarga</h2>
                </div>
                <div class="row">
                    <div class=" wow fadeIn" data-wow-duration=".3s" data-wow-delay=".2s">
                        <div class="news-img">
                            <img src="{{ asset('assets/assets-landingpage/images/Hex1.png') }}" alt="feature">
                        </div>
                        <div class="news-text">
                            <h4 class="text-center">Pengelolaan data keluarga</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class=" wow fadeIn" data-wow-duration=".4s" data-wow-delay=".3s">
                        <div class="news-img">
                            <img src="{{ asset('assets/assets-landingpage/images/Hex2.png') }}" alt="feature">
                        </div>
                        <div class="news-text">
                            <h4 class="text-center">Pengelolaan data iuran</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class=" wow fadeIn" data-wow-duration=".5s" data-wow-delay=".4s">
                        <div class="news-img">
                            <img src="{{ asset('assets/assets-landingpage/images/Hex3.png') }}" alt="feature">
                        </div>
                        <div class="news-text">
                            <h4 class="text-center">Pengelolaan data keuangan</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class=" wow fadeIn" data-wow-duration=".5s" data-wow-delay=".4s">
                        <div class="news-img">
                            <img src="{{ asset('assets/assets-landingpage/images/Hex4.png') }}" alt="feature">
                        </div>
                        <div class="news-text">
                            <h4 class="text-center">Pengelolaan data surat</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class=" wow fadeIn" data-wow-duration=".5s" data-wow-delay=".4s">
                        <div class="news-img">
                            <img src="{{ asset('assets/assets-landingpage/images/Hex5.png') }}" alt="feature">
                        </div>
                        <div class="news-text">
                            <h4 class="text-center">Pengelolaan data Informasi</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class=" wow fadeIn" data-wow-duration=".5s" data-wow-delay=".4s">
                        <div class="news-img">
                            <img src="{{ asset('assets/assets-landingpage/images/Hex6.png') }}" alt="feature">
                        </div>
                        <div class="news-text">
                            <h4 class="text-center">Pengelolaan data pengaduan</h4>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /news -->

    <!-- spicel features -->
    <section id="spicel-features">
        <div class="spicel-features">
            <div class="container">
                <div class="title text-center">
                    <h2>Sempurna untuk administrasi antar tetangga</h2>

                </div>
                <div class="row">
                    <div class="container text-center">
                        <div class="row gx-5">
                            <div class="col-12 d-flex justify-content-evenly">
                                <img src="{{ asset('assets/assets-landingpage/images/Laptop-Clipart-Icon.png') }}"
                                     alt="Laptop-Clipart-Icon"
                                     style="height: 254px;  margin-right:30px;">
                                <img src="{{ asset('assets/assets-landingpage/images/laptop-clipart-laptop-icon.png') }}"
                                     alt="laptop-clipart-laptop-icon"
                                     style="height: 254px; margin-left:10px; margin-right:30px;">
                                <img src="{{ asset('assets/assets-landingpage/images/hp.png') }}" alt="hp"
                                     style="height: 254px; margin-left:30px;">
                            </div>
                            <div class="col"
                                style=" display:flex; justify-content:space-between; margin:auto ; margin-top: 70px; width: 250px;">
                                <div>
                                    <i class="mdi
                                mdi-android"
                                        style="font-size:40px;"></i>
                                    <p>Android</p>
                                </div>
                                <div>
                                    <i class="mdi mdi-apple" style="font-size:40px;"></i>
                                    <p>Ios</p>
                                </div>
                                <div>
                                    <i class="mdi mdi-web" style="font-size:40px;"></i>
                                    <p>Web</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">
                        <h4>Kompatibel dengan berbagai device</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
