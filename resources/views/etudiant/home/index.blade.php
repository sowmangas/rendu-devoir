@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <header class="blok-heading">
                <h3 class="blok-title"> Liste des matières </h3>
            </header>
        </div>

        @forelse($devoirs as $devoir)
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('etudiant.devoirs.show', $devoir->nom_matiere) }}">
                            {{ $devoir->nom_matiere }}

                            <br>
                            <span class="badge badge-primary badge-pill pull-center">
                                {{ $devoir->nombre_rendu }} / {{ $devoir->nombre_devoir }}
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        @empty
        @endforelse
    </div>
@endsection

@section('vue')@stop

@section('js')
    @parent
@stop
