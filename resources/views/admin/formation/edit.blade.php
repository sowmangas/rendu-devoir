@extends('admin.home.index')

@section('homeContent')
    <form action="{{ route('admin.formations.update', $formation) }}" method="post">
        @csrf {{ method_field('put') }}

        <div class="form-group">
            <label for="nom_formation">NOM FORMATION</label>
            <input name="nom_formation" id="nom_formation" type="text" class="form-control{{ $errors->has('nom_formation') ? ' is-invalid' : '' }}"
                   value="{{ $errors->has('nom_formation') ? old('nom_formation') : $formation->nom_formation }}">
            @if ($errors->has('nom_formation'))
                <small class="text-danger">{{ $errors->first('nom_formation') }}</small>
            @endif
        </div>


        <div class="form-group">
            <button class="btn btn-primary">Soumettre</button>
        </div>

    </form>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
