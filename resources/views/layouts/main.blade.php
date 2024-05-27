<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kluwarga</title>
    <!-- ficon
============================================ -->
    <link rel="shortcut icon" href="{{ asset('assets/assets-landingpage/img/ficon.png') }}">
    <link href="{{ asset('assets/assets-landingpage/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Style CSS
============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/assets-landingpage/css/style.css') }}" type="text/css">
    <style>
        @media only screen and (min-width: 950px) {
            .nav-center {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <!--  Preloader  -->
    <div id="preloader">
        <div id="loading"> </div>
    </div>
    @include('layouts.navbar')

    @yield('content')

    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="weight">
                            <h3><a class="page-scroll" href="#home">ABOUT US</a></h3>
                            <ul>
                                <p>Why Integrasia?</p>
                                <p>Training Center</p>
                                <p>Blog</p>
                                <p>Contact</p>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="weight">
                            <h3><a class="page-scroll" href="#home">SERVICES</a></h3>
                            <ul>
                                <p>Mapping and GIS Services</p>
                                <p>OSMAP<br> (One Spirit WebGIS Open Platform)</p>
                                <p>SIOPAS & SIOPAS Plus</p>
                                <p>GeoHR</p>
                                <p>OSLOG <br>(Fleet Management System)</p>
                                <p>OSCARP (Carpooling)</p>
                                <p>OSME & OSME Plus</p>
                                <p>Argisource Data</p>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="weight">
                            <h3><a class="page-scroll" href="#home">PRODUCTS</a></h3>
                            <ul>
                                <p>Satellite</p>
                                <p>UAV</p>
                                <p>RPMA <br>(Random Phasa Multiple Access)</p>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="weight">
                            <h3><a class="page-scroll" href="#home">FOLLOW US</a></h3>
                        </div>
                        <div class="col-md-6">
                            <div class="social-f">
                                <ul>
                                    <li> <a href="#" class="fac"><i class="fa fa-facebook"></i></a> </li>
                                    <li><a href="#" class="twi"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="goo"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fa fa-github"
                                                aria-hidden="true"></i></a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>2022 &copy; Amezia </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @include('layouts.script')
</body>

</html>
