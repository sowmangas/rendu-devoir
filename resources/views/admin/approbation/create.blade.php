@extends('admin.home.index')

@section('homeContent')
    <h1>Formulaire de création d'une approbation</h1>
    <form action="{{ route('admin.formations.store') }}" method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nom_formation" class="sr-only">Nom de la formation</label>
            <input type="text" name="nom_formation" id="nom_formation" class="form-control
                       {{ $errors->has('nom_formation') ? ' is-invalid' : '' }}"
                   placeholder="Saisissez le nom de la formation" value="{{ old('nom_formation') }}">

            @if ($errors->has('nom_formation'))
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
