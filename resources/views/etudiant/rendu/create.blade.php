@extends('layouts.base')

@section('content')
    <h1>Formulaire de creation d'un rendu</h1>

    <div class="row">
        <div class="offset-2 col-md-8">
            <form action="{{ route('etudiant.rendus.store') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="devoir_id">Formation</label>
                    <select type="text" name="devoir_id" id="devoir_id" class="form-control">
                        <option disabled selected>Selectionner le devoir</option>
                        @foreach($devoirs as $devoir)
                            <option value="{{ old('devoir_id') ?: $devoir->id }}">
                                {{ $devoir->intitule }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="rendu">Selectionner le devoir à rendre <i>La taille maximal du fichier est de 2MB</i></label>
                    <input type="file" name="rendu" id="rendu" class="form-control" value="{{ old('rendu') }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
@stop
@section('vue')@stop

@section('js')
    @parent

@stop
