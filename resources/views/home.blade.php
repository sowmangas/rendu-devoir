@extends('layouts.base')

@section('content')
    <div class="row">
        @forelse($devoirs as $devoir)
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $devoir->nom_matiere }}
                        <span class="badge badge-primary badge-pill">
                            {{ $devoirs->count() }}
                        </span>
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
