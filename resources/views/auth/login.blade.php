@extends('layouts.app', ['title' => 'Login'])

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-19 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login100-form-avatar"><img src="{{ asset('images/logo-upjv-bleu.png') }}" alt=""></div>

                    <span class="login100-form-title p-t-20 p-b-45">Identifiez-vous</span>

                    <div class="wrap-input100 validate-input m-b-10{{ $errors->has('adresse_mel') ? ' alert-validate' : '' }}"
                         data-validate="@if ($errors->has('adresse_mel')){{ $errors->first('adresse_mel') }}@endif">
                        <label for="email" class="sr-only"></label>
                        <input id="email" class="input100" type="text" name="adresse_mel" value="{{ old('adresse_mel') }}" placeholder="Nom d'utilisateur" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10{{ $errors->has('password') ? ' alert-validate' : '' }}"
                         data-validate="@if ($errors->has('password')){{ $errors->first('password') }}@endif">
                        <label for="password" class="sr-only"></label>
                        <input class="input100{{ $errors->has('password') ? ' alert-validate' : '' }}" type="password" id="password" name="password" placeholder="Mot de pass">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">Connexion</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@stop
@section('vue')@stop

@section('js')
    @parent

@stop
