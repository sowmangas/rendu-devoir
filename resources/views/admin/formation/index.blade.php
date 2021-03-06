@extends('admin.home.index')

@section('homeContent')
    <h6><a href="{{ route('admin.formations.create') }}" class="btn btn-primary">Création d'une formation</a></h6>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <td class="text-center">Nom Formation</td>
            <td class="text-center">Nombre d'étudiants</td>
            <td class="text-center">Liste d'étudiants</td>
            <td class="text-center">Modification</td>
        </tr>
        </thead>

        <tbody>
        @foreach ($formations as $formation)
            <tr class="text-center">
                <td>{{ $formation->nom_formation }} </td>
                <td>
                        {{ $formation->users_count }}

                </td>
                <td>
                    <a href="{{ route('admin.users.list', $formation->id) }}" class="btn btn-primary" >
                        Afficher
                    </a>
                </td>
                <td>
                    <a href="{{ route('admin.formations.edit', $formation) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
