<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fvc.ico') }}">
        <title>Trường Tiểu Học Tân Thái</title>
        <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="/source/assets/css/bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="/source/style.css"/>

        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="/source/assets/css/slick.css" />
        <link type="text/css" rel="stylesheet" href="/source/assets/css/slick-theme.css" />

        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="/source/assets/css/nouislider.min.css" />

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="/source/assets/fontawesome-free/css/all.min.css">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="/source/assets/css/style.css"/>
        <link type="text/css" rel="stylesheet" href="/source/assets/css/main-css.css"/>
        <link rel="stylesheet" href="/source/assets/sweetalert/sweetalert2.min.css">
    </head>
    <body style="font-family: 'Quicksand';">
        @include('header')
            @yield('content')
        @include('footer')
        <script src="/source/assets/sweetalert/sweetalert2.min.js"></script>
        <script src="/source/assets/js/jquery.min.js"></script>
        <script src="/source/assets/js/bootstrap.min.js"></script>
        <script src="/source/assets/js/slick.min.js"></script>
        <script src="/source/assets/js/nouislider.min.js"></script>
        <script src="/source/assets/js/jquery.zoom.min.js"></script>
        <script src="/source/assets/js/main.js"></script>
        <script>
        $(document).ready(function($) {

        });
        </script>
        @yield('script')
    </body>
</html>