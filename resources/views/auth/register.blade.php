@extends('layouts.base')

@section('content')

    <register-component url="{{ route('register') }}"></register-component>

{{--    <div class="limiter">--}}
{{--        <div class="container-login100">--}}
{{--            <div class="wrap-login100 p-t-0 p-b-30">--}}
{{--                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">--}}
{{--                {{ csrf_field()}}--}}
{{--                <!--div class="login100-form-avatar">--}}
{{--                        <img src="images/logo-upjv-bleu.png" alt="logo">--}}
{{--                    </div-->--}}

{{--                    <span class="login100-form-title p-t-20 p-b-45">Inscrivez-vous</span>--}}

{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                        <input class="input100{{ $errors->has('nom') ? ' alert-validate' : '' }}" type="text" name="nom"--}}
{{--                               value="{{ old('nom') }}" placeholder="Nom" autofocus>--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="symbol-input100">--}}
{{--                        </span>--}}
{{--                        @if ($errors->has('nom'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('nom') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                        <input class="input100{{ $errors->has('prenom') ? ' alert-validate' : '' }}" type="text"--}}
{{--                               name="prenom" value="{{ old('prenom') }}" placeholder="Prénom" autofocus>--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="symbol-input100">--}}
{{--                        </span>--}}
{{--                        @if ($errors->has('prenom'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('prenom') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                        <input class="input100{{ $errors->has('adresse_mel') ? ' alert-validate' : '' }}" type="text"--}}
{{--                               name="adresse_mel" value="{{ old('adresse_mel') }}" placeholder="Email" autofocus>--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="symbol-input100">--}}
{{--                        </span>--}}
{{--                        @if ($errors->has('adresse_mel'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('adresse_mel') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <register-component formations="{{ $formations }}"></register-component>--}}

{{--                    --}}{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                    --}}{{--                        <select class="input100{{ $errors->has('role') ? ' alert-validate' : '' }}" type="text"--}}
{{--                    --}}{{--                                name="role">--}}
{{--                    --}}{{--                            <option value="{{ \App\Enum\UserRole::ADMIN }}">Admin</option>--}}
{{--                    --}}{{--                            <option value="{{ \App\Enum\UserRole::PROF }}">Professeur</option>--}}
{{--                    --}}{{--                            <option value="{{ \App\Enum\UserRole::ETUDIANT }}">Etudiant</option>--}}
{{--                    --}}{{--                        </select>--}}
{{--                    --}}{{--                        <span class="focus-input100"></span>--}}
{{--                    --}}{{--                        <span class="symbol-input100"></span>--}}
{{--                    --}}{{--                        @if ($errors->has('role'))--}}
{{--                    --}}{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                    --}}{{--                                <strong>{{ $errors->first('role') }}</strong>--}}
{{--                    --}}{{--                            </span>--}}
{{--                    --}}{{--                        @endif--}}
{{--                    --}}{{--                    </div>--}}

{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                        <input class="input100{{ $errors->has('titre') ? ' alert-validate' : '' }}" type="text"--}}
{{--                               name="titre" value="{{ old('titre') }}" placeholder="Titre" autofocus>--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="symbol-input100">--}}
{{--                        </span>--}}
{{--                        @if ($errors->has('titre'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('titre') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                        <label for="formation" class="sr-only"></label>--}}
{{--                        <select id="formation" class="input100" name="role">--}}
{{--                            @foreach($formations as $formation)--}}
{{--                            <option value="{{ $formation->id }}">{{ $formation->nom_formation }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="symbol-input100">--}}
{{--                    </span>--}}
{{--                        @if ($errors->has('role'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $errors->first('role') }}</strong>--}}
{{--                        </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                        <input class="input100{{ $errors->has('password') ? ' alert-validate' : '' }}" type="password"--}}
{{--                               name="password" placeholder="Mot de pass">--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="symbol-input100">--}}
{{--                            <i class="fa fa-lock"></i>--}}
{{--                        </span>--}}

{{--                        @if ($errors->has('password'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('password') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">--}}
{{--                        <input class="input100{{ $errors->has('pwd_confirmation') ? ' alert-validate' : '' }}"--}}
{{--                               type="password" name="pwd_confirmation" placeholder="Confirmez le mot de pass">--}}
{{--                        <span class="focus-input100"></span>--}}
{{--                        <span class="symbol-input100">--}}
{{--                            <i class="fa fa-lock"></i>--}}
{{--                        </span>--}}

{{--                        @if ($errors->has('pwd_confirmation'))--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $errors->first('pwd_confirmation') }}</strong>--}}
{{--                            </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="container-login100-form-btn p-t-10">--}}
{{--                        <button class="login100-form-btn">--}}
{{--                            Iscription--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@stop
