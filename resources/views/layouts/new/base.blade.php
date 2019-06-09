<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title . ' - ' . env('APP_NAME') }}</title>

    @section('vue')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    @show

    @section('css')
{{--        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/img/favicon.ico') }}">--}}
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/icons/tn_favicon.jpg') }}"/>


        <script src="{{ asset('template/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('template/js/script.js') }}" type="text/javascript"></script>

        <!-- bootstrap -->
        <link href="{{ asset('template/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
        <script src="{{ asset('template/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

        <!-- font awesome -->
        <link href="{{ asset('template/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>

        <!-- Owl slider -->
        <link rel="stylesheet" href="{{ asset('tempalte/plugins/owl-carousel/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('tempalte/plugins/owl-carousel/owl-theme.min.css') }}">
        <script src="{{ asset('template/plugins/owl-carousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('template/plugins/owl-carousel/plugin-setting.js') }}"></script>

        <!-- custom style -->
        <link href="{{ asset('template/css/mystyle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('template/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)"/>
    @show
</head>
<body>

<div class="main-wrap" id="app">
    @include('layouts.new.header')

    @if (session('message'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
            </div>
        </div>
    @endif

    <section class="wrap wrap-team">

        <div class="container">

            @yield('content')

        </div>

    </section>

    @include('layouts.new.footer')
</div>
<!-- main wrap finish -->
<a href="#top" class="topHome">
    <i class="fa fa-chevron-up fa-2x"></i>
</a>

@section('js')
@show
</body>
</html>
