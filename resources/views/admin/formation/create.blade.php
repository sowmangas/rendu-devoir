@extends('layouts.base')

@section('content')
    <h1>Formulaire de creation de formation</h1>

    <div class="row">
        <div class="offset-2 col-md-8">
            <form action="{{ route('admin.formations.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nom_formation" class="sr-only">Nom de la formation</label>
                    <input type="text" name="nom_formation" id="nom_formation" class="form-control"
                           placeholder="Saisissez le nom de la formation">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
@stop
