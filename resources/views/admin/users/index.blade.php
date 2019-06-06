@extends('admin.home.index')

@section('homeContent')
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <td class="text-center">Prenom et Nom</td>
            <td class="text-center">Email</td>
            <td class="text-center">Role</td>
            <td class="text-center" colspan="2">Actions</td>
        </tr>
        </thead>

        <tbody>
        @foreach ($users as $user)
            <tr class="text-center">
                <td>{{ $user->prenom }} {{ $user->nom }}</td>
                <td>{{ $user->adresse_mel }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-danger">
                        <i class="fa fa-unlock"></i>
                    </a>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-danger">
                        <i class="fa fa-lock"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
