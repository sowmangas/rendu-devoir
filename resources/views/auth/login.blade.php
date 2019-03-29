@extends('layouts.base')

@section('css')
    @parent
@stop

@section('content')
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-19 p-b-30">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="login100-form-avatar">
                        <img src="images/logo-upjv-bleu.png" alt="logo">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        Identifiez-vous
                    </span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire" >
                        <input class="input100{{ $errors->has('adresse_mel') ? ' alert-validate' : '' }}" type="text" name="adresse_mel" value="{{ old('adresse_mel') }}" placeholder="Nom d'utilisateur" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                        @if ($errors->has('adresse_mel'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('adresse_mel') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">
                        <input class="input100{{ $errors->has('password') ? ' alert-validate' : '' }}" type="password" name="password" placeholder="Mot de pass">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">
                            Connexion
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    
@stop