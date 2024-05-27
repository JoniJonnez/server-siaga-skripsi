<header id="home">
    <!-- nav -->
    <div id="mainNav" class="navbar navbar-fixed-top affix-top" style="background-color: #fff; padding-bottom: 15px">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-inverse navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle
                                navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                            <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="/"><img style="display:inline-block; margin: 0 6px 7px 0;"
                                width="30" height="30" class="mx-3"
                                src="{{ asset('assets/assets-landingpage/img/logo-KLUWARGA.png') }}">KLUWARGA
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1"
                        data-hover="dropdown" data-animations="fadeIn fadeInLeft fadeInUp fadeInRight">
                        <ul class="nav navbar-nav nav-center">
                            <li> <a class="page-scroll" href="{{ route('login') }}">Masuk</a></li>
                            <li> <a class="page-scroll" href="{{ route('register') }}">Daftar</a> </li>
                        </ul>
                        <!-- /.navbar-collapse -->
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">

                            <button type="button" class="btn btn-success getbtn"
                                onclick="window.location.href='/login'">Masuk</button>
                            <button style="background-color:transparent; color:green;" type="button"
                                class="btn btn-success getbtn"
                                onclick="window.location.href='/register'">Daftar</button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- /nav -->
</header>
