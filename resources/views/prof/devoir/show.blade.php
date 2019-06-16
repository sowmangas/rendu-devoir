@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (!$devoir->visible_corrige_type)
                <form action="{{ route('prof.devoirs.putVisible', $devoir) }}" method="post"
                      onsubmit="return confirm('Vous êtes sur le point d\'afficher le corrigé type. l\'opération est irreversible. \n Êtes-vous sûr ?')">
                    @csrf {{ method_field('put') }}
                    <button type="submit" class="btn btn-primary btn-sm">Afficher corrigé type</button>
                </form>
            @endif

            <form action="{{ route('prof.rendus.update', $devoir) }}" method="post"
                  onsubmit="return confirm('Vous êtes sur le point de corriger un devoir, \n l\'opération est irreversible.\n Êtes-vous sûr ?')">
                @csrf {{ method_field('put') }}

                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Etudiant</th>
                        <th class="text-center">Adresse mail</th>
                        <th class="text-center">Intitulé</th>
                        <th class="text-center">Période</th>
                        <th class="text-center">Note</th>
                        <th class="text-center">Commentaires</th>
                        <th class="text-center">Rendu</th>
                        <th class="text-center">Date de dépôt</th>
                        <th class="text-center" colspan="2">Options</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($devoir->rendus as $rendu)
                        <tr class="text-center">
                            <td>{{ $rendu->user->prenom }} {{ $rendu->user->nom }}</td>
                            <td>{{ $rendu->user->adresse_mel }}</td>
                            <td>{{ $devoir->intitule }}</td>
                            <td>{{ $devoir->periode }}</td>
                            <td>
                                <label for="note" class="sr-only"></label>
                                <input type="text" name="note" id="note" class="form-control form-control-sm"
                                       placeholder="Saisir la note de l'étudiant" value="{{ $rendu->note }}"
                                    {{ $rendu->note ? 'disabled' : '' }}>
                                <label for="note" class="sr-only"></label>
                                <input type="hidden" name="etudiant_id" value="{{ $rendu->user_id }}">
                            </td>
                            <td>
                                <label for="commentaire" class="sr-only"></label>
                                <textarea name="commentaire" id="commentaire" cols="30" rows="5"
                                          {{ $rendu->commentaire ? 'disabled' : '' }} class="form-control form-control-sm"
                                          placeholder="Saisir un commentaire">{{ $rendu->commentaire }}</textarea>
                            </td>
                            <td class="text-center">
                                <a href="{{ asset($rendu->rendu) }}" download class="btn btn-link"
                                   title="Téléchargé le rendu">
                                    <i class="fa fa-download"></i>
                                </a>
                            </td>
                            <td class="text-center">{{ $rendu->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-default btn-sm"
                                    {{ ($rendu->note && $rendu->commentaire) ? 'disabled' : '' }}>
                                    Corriger
                                </button>
                            </td>
                            <td class="text-center">
                                @if ($rendu->note)
                                    <update-note-component
                                        url="{{ route('prof.modification.note') }}"
                                        csrf="{{ csrf_token() }}"
                                        :userid="{{ Auth::id() }}"
                                        :renduid="{{ $rendu->id }}"
                                        :oldnote="{{ $rendu->note }}"
                                        oldcommentaire="{{ $rendu->commentaire }}"
                                        :etudiantid="{{$rendu->user_id}}">
                                    </update-note-component>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
@stop
@section('js')@stop
