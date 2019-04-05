@extends('layouts.base')

@section('content')
    <div class="row">
        @forelse($devoirs as $devoir)
            <div class="col-md-4">
                <h1>{{ $devoir->nom_matiere }} {{ $devoirs->count() }}</h1>
            </div>
        @empty
        @endforelse
    </div>
@endsection
