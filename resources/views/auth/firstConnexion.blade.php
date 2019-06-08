@extends('layouts.app', ['title' => 'Premiere connexion'])

@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-19 p-b-30">
                <form class="login100-form validate-form" method="POST">
                    @csrf

                    <div class="login100-form-avatar">
                        <img src="{{ asset('images/logo-upjv-bleu.png') }}" alt="logo">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        Remplir les informations suivantes
                    </span>


                    <div class="wrap-input100 validate-input m-b-10{{ $errors->has('password_old') ? ' alert-validate' : '' }}"
                         data-validate="@if ($errors->has('password_old')){{ $errors->first('password_old') }}@endif">
                        <label for="password_old" class="sr-only"></label>
                        <input id="password_old" class="input100" type="password" name="password_old" value="{{ old('password_old') }}" placeholder="Ancien mot de passe" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10{{ $errors->has('password') ? ' alert-validate' : '' }}"
                         data-validate="@if ($errors->has('password')){{ $errors->first('password') }}@endif">
                        <label for="password" class="sr-only"></label>
                        <input id="password" class="input100" type="password" name="password" placeholder="Nouveau mot de passe">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10{{ $errors->has('password_confirmation') ? ' alert-validate' : '' }}"
                         data-validate="@if ($errors->has('password_confirmation')){{ $errors->first('password_confirmation') }}@endif">
                        <label for="password_confirmation" class="sr-only"></label>
                        <input id="password_confirmation" class="input100" type="password" name="password_confirmation" placeholder="Nouveau mot de passe de confirmation">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">Sauvegarder</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop

@section('vue')@stop
