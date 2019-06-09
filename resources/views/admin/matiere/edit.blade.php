@extends('admin.home.index')

@section('homeContent')
    <form action="{{ route('admin.matiere.update', $matiere) }}" method="post">
        @csrf {{ method_field('put') }}

        <div class="form-group">
            <label for="nom_matiere">NOM MATIERE</label>
            <input name="nom_matiere" id="nom_matiere" type="text" class="form-control{{ $errors->has('nom_matiere') ? ' is-invalid' : '' }}"
                   value="{{ $errors->has('nom_matiere') ? old('nom_matiere') : $matiere->nom_matiere }}">
            @if ($errors->has('nom_matiere'))
                <small class="text-danger">{{ $errors->first('nom_matiere') }}</small>
            @endif
        </div>


        <div class="form-group">
            <button class="btn btn-primary">Soumettre</button>
        </div>

    </form>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
