@extends('admin.home.index')

@section('homeContent')
    <h6><a href="{{ route('admin.matiere.create') }}" class="btn btn-primary">Création d'une matière</a></h6>
    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <td class="text-center">Matière</td>
            <td class="text-center">Modification</td>
            <td class="text-center" colspan="2">Actions</td>
        </tr>
        </thead>

        <tbody>
        @foreach ($matieres as $matiere)
            <tr class="text-center">
                <td>{{ $matiere->nom_matiere }} </td>
                <td>
                    <a href="{{ route('admin.matiere.edit', $matiere) }}" class="btn btn-primary">
                        <i class="fa fa-edit"></i>
                    </a>
                </td>
                <td>
                        <form method="post" action="{{ route('admin.matiere.destroy', $matiere) }}">
                            @csrf {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger" title="Supprimer la matiere">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

{{--@section('vue')@stop--}}

@section('js')@stop
