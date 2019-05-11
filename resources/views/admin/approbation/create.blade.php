@extends('admin.home.index')

@section('homeContent')
    <h1>Formulaire d'approbation</h1>
    <approbation-modif-note-component url="{{ route('admin.approb.create') }}">
    </approbation-modif-note-component>
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <table class="table table-sm table-hover">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th class="text-center">Intitulé</th>--}}
{{--                    <th class="text-center">Période</th>--}}
{{--                    <th class="text-center">Note</th>--}}
{{--                    <th class="text-center">Commentaires</th>--}}
{{--                    <th class="text-center">Rendu</th>--}}
{{--                    <th class="text-center">Date de dépôt</th>--}}
{{--                    <th class="text-center" colspan="2">Options</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}

{{--                <tbody>--}}
{{--                @foreach ($modificationNotes as $modificationNote)--}}
{{--                    <form action="{{ route('admin.approb.update', $modificationNote) }}" method="post"--}}
{{--                          onsubmit="return confirm('Vous êtes sur le point de confirmer une modification de note, \n l\'opération est irreversible.\n Êtes-vous sûr ?')">--}}
{{--                        @csrf {{ method_field('put') }}--}}
{{--                        <tr class="text-center">--}}
{{--                            <td>{{ $modificationNote }}</td>--}}
{{--                            <td>{{ $modificationNote->periode }}</td>--}}
{{--                            <td>{{ $modificationNote->periode }}</td>--}}
{{--                            <--}}
{{--                            <td class="text-center">--}}
{{--                                <button type="submit" class="btn btn-outline-primary btn-sm">--}}
{{--                                    Corriger--}}
{{--                                </button>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    </form>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}
@stop

@section('js')
@stop
