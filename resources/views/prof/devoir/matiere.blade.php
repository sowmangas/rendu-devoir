@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm table-hover">
                <thead>
                <tr>
                    <th class="text-center">Intitulé</th>
                    <th class="text-center">Période</th>
                    <th class="text-center">Corrigé type</th>
                    <th class="text-center">Nom matière</th>
                    <th class="text-center">Enoncé</th>
                    <th class="text-center">Date limite</th>
                </tr>
                </thead>

                <tbody>
                    @foreach ($devoirs as $devoir)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('prof.devoirs.show', $devoir) }}">
                                    {{ $devoir->intitule }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('prof.devoirs.show', $devoir) }}">
                                    {{ $devoir->periode }}
                                </a>
                            </td>
                            @if ($devoir->type_correction)
                                <td class="text-center">{{ $devoir->corrige_type }}</td>
                            @endif
                            <td class="text-center">
                                <a href="{{ route('prof.devoirs.show', $devoir) }}">
                                    {{ $devoir->nom_matiere }}
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ asset($devoir->enonce) }}" download class="btn btn-link"
                                   title="Téléchargé l'énonce">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center">{{ $devoir->date_limit_depot->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
