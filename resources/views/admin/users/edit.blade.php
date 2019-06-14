@extends('admin.home.index')

@section('homeContent')
    <form action="{{ route('admin.users.update', $user) }}" method="post">
        @csrf {{ method_field('put') }}

        <div class="form-group">
            <label for="adresse_mel">Adresse Mèl</label>
            <input name="adresse_mel" id="adresse_mel" type="text" class="form-control{{ $errors->has('adresse_mel') ? ' is-invalid' : '' }}"
                   value="{{ $errors->has('adresse_mel') ? old('adresse_mel') : $user->adresse_mel }}">
            @if ($errors->has('adresse_mel'))
                <small class="text-danger">{{ $errors->first('adresse_mel') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="nom">NOM</label>
            <input name="nom" id="nom" type="text" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}"
                   value="{{ $errors->has('nom') ? old('nom') : $user->nom }}">
            @if ($errors->has('nom'))
                <small class="text-danger">{{ $errors->first('nom') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="prenom">PRENOM</label>
            <input name="prenom" id="prenom" type="text" class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}"
                   value="{{ old('prenom') ?? $user->prenom }}">
            @if ($errors->has('prenom'))
                <small class="text-danger">{{ $errors->first('prenom') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="role">ROLE</label>
            <select name="role" id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}">
                @foreach ($roles as $role)
                    <option {{ $role == $user->role ? 'selected' : '' }} value="{{ $role }}">
                        {{ $role }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="titre">TITRE</label>
            <input name="titre" id="titre" type="text" class="form-control{{ $errors->has('titre') ? ' is-invalid' : '' }}"
                   value="{{ old('titre') ?? $user->titre }}">
            @if ($errors->has('titre'))
                <small class="text-danger">{{ $errors->first('titre') }}</small>
            @endif
        </div>

        <div class="form-group">
            <label for="formation_id">FORMATION</label>
            <select name="formation_id" id="formation_id" class="form-control{{ $errors->has('formation_id') ? ' is-invalid' : '' }}">
                <option {{ $user->formation_id ? 'selected' : '' }} value="{{ $user->formation_id }}">
                    @if ($user->formation)
                        {{ $user->formation->nom_formation }}
                    @endif
                </option>
                @foreach ($formations as $formation)
                    <option {{ $formation->id == $user->formation_id ? 'selected' : '' }} value="{{ $formation->id }}">
                        {{ $formation->nom_formation }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('formation_id'))
                <small class="text-danger">{{ $errors->first('formation_id') }}</small>
            @endif
        </div>

        <div class="form-group">
            <button class="btn btn-primary">Soumettre</button>
        </div>

    </form>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
