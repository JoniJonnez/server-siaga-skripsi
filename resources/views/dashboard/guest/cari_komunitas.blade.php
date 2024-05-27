@extends('layouts.main')
@section('content')
    {{-- CARI KOMUNITAS --}}
    <section id="about">
        <div class="searchkom">
            <div class="row">
                <div class="container text-center " style="margin-top: 100px; margin-bottom: 100px;">
                    <div class="row gx-5">
                        <h2 style="color: white;">Carilah komunitasmu disini</h2>
                        <div class="col"
                            style="display:flex; justify-content:space-between; margin:auto ; margin-top: 70px; width: 80%;">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                style="height: 40px;">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="toggleSection()">
                                    <img src="{{ asset('assets/images/search.png') }}" alt="feature" style="width="25"
                                        height="25" class="mx-3">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section>
            <div class="about" style="padding-top: 50px; padding-bottom: 200px;">
                <div>
                    <h1 class="text-center"> Hasil pencarian</h1>
                </div>

                <div class="card searchresult"
                    style="background-image: url('{{ asset('assets/images/warrior.jpg') }}');  display: none;"
                    id="hiddenSection">
                    <div class="card-body searchresult-box"
                        style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0), #591a1a,#cb2727); margin-top: 5%;">
                        <div class="row">
                            <div class="col-6 text-center"
                                style="margin-top:100px; margin-bottom:20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.45); color: white; ">
                                <img src="{{ asset('assets/images/warrior.jpg') }}" alt="" class="search-circle"
                                    style="object-fit: cover;">

                                <h3>Pereman Pasar</h3>
                                <p>"Penakluk Pondok Kelapa"</p>
                                <hr class="col-9" style="border-color:#fff">

                                <div class="row align-items-left">
                                    <div class="col searchresult-info">
                                        <span class="w-20">
                                            <i class="dripicons-user"></i>
                                            <p class="d-inline-block">11</p>
                                        </span>
                                        <span class="w-20">
                                            <i class="dripicons-home"></i>
                                            <p class="d-inline-block">7</p>
                                        </span>
                                        <span class="w-35">
                                            <i class="dripicons-location"> Pondok Kelapa, Duren Sawit, Jakarta
                                                Timur.</i>
                                        </span>
                                        <span class="w-25">
                                            <i class="mdi mdi-phone"></i>
                                            <p class="d-inline-block">08111080111</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6 text-left" style="padding-left: 5%; padding-bottom: 20px; ">
                                    <h3>Foto Event Kegiatan</h3>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="{{ asset('assets/images/s1.png') }}" alt="" style="width: 30%; height: auto; margin-right:10px;">
                                    <img src="{{ asset('assets/images/s2.png') }}" alt="" style="width: 30%; height: auto; zargin-left:10px; margin-right:10px;">
                                    <img src="{{ asset('assets/images/s3.png') }}" alt="" style="width: 30%; height: auto; margin-left:10px; ">
                                </div>

                            </div>
                        </div>
                        {{-- <div class="container text-left" id="hiddenSection" style="display: none;">
                <div class="row align-items-left">
                    <div class="col searchresult" style="padding: 35px;">
                        <div>
                            <h2 style="color: rgb(55, 55, 55); padding-bottom: 10px;">Pereman Pasar</h2>
                            <p style="padding-bottom: 10px;font-style: italic;">Penakluk Pondok Kelapa</p>
                            <span class="w-35">
                                <p class="dripicons-location"> Pondok Kelapa, Duren Sawit, Jakarta Timur.</p>
                            </span>
                            <div class="col" style="display:flex; ">
                                <span class="w-20" style="margin-right: 20px;">
                                    <i class="dripicons-user"></i>
                                    <p class="d-inline-block">11</p>
                                </span>
                                <span class="w-20" style="margin-right: 20px;">
                                    <i class="dripicons-home"></i>
                                    <p class="d-inline-block">7</p>
                                </span>
                            </div>
                        </div>
                        <img src="{{ asset('assets/images/warrior.jpg') }}" alt="feature" style="width: 50%; height: auto; margin-left: 10px;">
                    </div>
                </div>
            </div> --}}
                    </div>
        </section>
    </section>

    <script>
        function toggleSection() {
            var hiddenSection = document.getElementById('hiddenSection');
            hiddenSection.style.display = hiddenSection.style.display === 'none' ? 'block' : 'none';


        }
    </script>
@endsection
