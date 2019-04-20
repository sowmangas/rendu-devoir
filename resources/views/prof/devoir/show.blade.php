@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm table-hover">
                <thead>
                <tr>
                    <th class="text-center">Intitulé</th>
                    <th class="text-center">Période</th>
                    <th class="text-center">Note</th>
                    <th class="text-center">Commentaires</th>
                    <th class="text-center">Rendu</th>
                    <th class="text-center">Date de dépôt</th>
                    <th class="text-center">Corrigé type</th>
                    <th class="text-center">Option</th>
                </tr>
                </thead>

                <tbody>
                <form action="{{ route('prof.devoirs.update', $devoir) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}

                    @foreach ($devoir->rendus as $rendu)
                        <tr>
                            <td>{{ $devoir->intitule }}</td>
                            <td>{{ $devoir->periode }}</td>
                            <td>
                                <label for="note" class="sr-only"></label>
                                <input type="text" name="note" id="note" class="form-control form-control-sm"
                                       placeholder="Saisir la note de l'étudiant" value="{{ $rendu->note }}">
                                <label for="note" class="sr-only"></label>
                                <input type="hidden" name="etudiant_id" value="{{ $rendu->user_id }}">
                            </td>
                            <td>
                                <label for="commentaire" class="sr-only"></label>
                                <textarea name="commentaire" id="commentaire" cols="40" rows="5"
                                          class="form-control form-control-sm"
                                          placeholder="Saisir un commentaire">{{ $rendu->commentaire }}</textarea>
                            </td>
                            <td class="text-center">
                                <a href="{{ asset($rendu->rendu) }}" download class="btn btn-link"
                                   title="Téléchargé le rendu">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center">{{ $rendu->created_at->format('d/m/Y') }}</td>
                            @if ($devoir->type_correction)
                                <td>
                                    <input type="file" name="corrige_type" id="corrige_type"
                                           class="form-control form-control-sm">
                                </td>
                            @endif
                            <td class="text-center">
                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    Corriger
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </form>
                </tbody>
            </table>
        </div>
    </div>
@stop
