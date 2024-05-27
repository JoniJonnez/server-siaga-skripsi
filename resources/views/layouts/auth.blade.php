<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/assets-login/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/assets-login/css/owl.carousel.min.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/assets-login/css/bootstrap.min.css') }}">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/assets-login/css/style.css') }}">

    <title>@yield('title')</title>
</head>

<body>
    @yield('content')
    <script src="{{ asset('assets/assets-login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/assets-login/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/assets-login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/assets-login/js/main.js') }}"></script>
</body>

</html>
