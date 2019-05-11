@extends('admin.home.index')

@section('homeContent')
    <h1>Formulaire d'une matière</h1>
    <form action="{{ route('admin.matiere.store') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nom_matiere" class="sr-only">Nom de la matiere</label>
            <input type="text" name="nom_matiere" id="nom_matiere" class="form-control
                       {{ $errors->has('nom_matiere') ? ' is-invalid' : '' }}"
                   placeholder="Saisissez le nom de la matière" value="{{ old('nom_matiere') }}">

            @if ($errors->has('nom_matiere'))
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nom_formation') }}</strong>
                        </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Sauvegarder</button>
        </div>
    </form>
@stop
@section('vue')@stop

@section('js')
    @parent

@stop
