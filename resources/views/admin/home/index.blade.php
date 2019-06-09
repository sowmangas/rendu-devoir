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

                <a href="{{ route('admin.matiere.index') }}" class="list-group-item list-group-item-action
                    {{ setActiveRoot('admin.matiere.index') }}">
                    {{ __('Gestion des matières') }}
                </a>

                <a href="{{ route('admin.formations.index') }}" class="list-group-item list-group-item-action
                    {{ setActiveRoot('admin.formations.index') }}">
                    {{ __('Gestion des formations') }}
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
