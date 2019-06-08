{{--@extends('layouts.base', ['title' => "Home"])--}}
@extends('layouts.new.base', ['title' => 'Administration'])

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action
                    {{ setActiveRoot('admin.users.index') }}">
                    {{ __('Gestion des utilisateurs') }}
                </a>

                <a href="{{ route('admin.matiere.create') }}" class="list-group-item list-group-item-action
                    {{ setActiveRoot('admin.matiere.create') }}">
                    {{ __('Création d\'une matière') }}
                </a>

                <a href="{{ route('admin.formations.create') }}" class="list-group-item list-group-item-action
                    {{ setActiveRoot('admin.formations.create') }}">
                    {{ __('Création d\'une formation') }}
                </a>

                <a href="{{ route('admin.approb.create') }}" class="list-group-item list-group-item-action
                    {{ setActiveRoot('admin.approb.create') }}">
                    {{ __('Approbation des demandes') }}
                </a>
            </div>
        </div>

        <div class="col-md-9">
            @yield('homeContent')
        </div>
    </div>
@stop

@section('js')
    @parent
@stop