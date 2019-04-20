<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

    @section('css')
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    @show
</head>
<!--===============================================================================================-->
<body>
<div id="app">
    @include('layouts._nav')

    @if (session('message'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
            </div>
        </div>
    @endif

    <main class="py-4">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
</div>
<!--===============================================================================================-->
<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
