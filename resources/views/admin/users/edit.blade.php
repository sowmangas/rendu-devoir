@extends('admin.home.index')

@section('homeContent')
    <form action="" method="post">
        <div class="form-group">
            <label class="sr-only" for="name"></label>
            <input name="name" id="name" type="text" class="form-control" value="{{ old('name') ?? $user->nom }}">
        </div>

        <div class="form-group">
            <label class="sr-only" for="name"></label>
            <input name="name" id="name" type="text" class="form-control" value="{{ old('name') ?? $user->nom }}">
        </div>

        <div class="form-group">
            <label class="sr-only" for="name"></label>
            <input name="name" id="name" type="text" class="form-control" value="{{ old('name') ?? $user->nom }}">
        </div>

        <div class="form-group">
            <label class="sr-only" for="name"></label>
            <input name="name" id="name" type="text" class="form-control" value="{{ old('name') ?? $user->nom }}">
        </div>

        <div class="form-group">
            <label class="sr-only" for="name"></label>
            <input name="name" id="name" type="text" class="form-control" value="{{ old('name') ?? $user->nom }}">
        </div>

        <div class="form-group">
            
        </div>

    </form>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
