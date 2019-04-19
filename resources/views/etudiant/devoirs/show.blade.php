@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm table-hover table">
                <thead>
                <tr>
                    <th class="text-center">Intitulé</th>
                    <th class="text-center">Période</th>
                    <th class="text-center">Evalué</th>
                    <th class="text-center">Type correction</th>
                    <th class="text-center">Date limite depot</th>
                    <th class="text-center">Enoncé</th>
                    <th class="text-center">Corrigé type</th>
                    <th class="text-center">Rendu</th>
                </tr>
                </thead>

                <tbody>
                @forelse($devoirs as $devoir)
                    <tr class="text-center">
                        <td>{{ $devoir->intitule }}</td>
                        <td>{{ $devoir->periode }}</td>
                        <td>{{ $devoir->evalue }}</td>
                        <td>{{ $devoir->type_correction }}</td>
                        <td>{{ $devoir->date_limit_depot }}</td>
                        <td>
                            <a href="{{ $devoir->enonce }}" download="{{ $devoir->enonce }}" class="btn btn-link">
                                Télécharger <i class="fa fa-download"></i>
                            </a>
                        </td>
                        <td>{{ $devoir->corrige_type }}</td>
                        <td>
                            {{ $devoir->rendu }}
                            @if ($devoir->rendu)
                                <a href="{{ asset('storage/'.$devoir->rendu) }}" download class="btn btn-link">
                                    Télécharger <i class="fa fa-download"></i>
                                </a>
                            @else
                            <form action="{{ route('etudiant.rendus.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row pull-right">
                                    <div class="col-md-6">
                                        <label for="rendu" class="sr-only">Rendu</label>
                                        <input type="file" name="rendu" id="rendu" class="form-control-sm form-control{{ $errors->has('rendu') ? ' is-invalid' : '' }}">
                                        <input type="hidden" name="devoir_id" id="devoir_id" value="{{ $devoir->id }}">

                                        @if ($errors->has('rendu'))
                                            <div class="alert alert-danger">{{ $errors->first('rendu') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-outline-primary btn-sm">Soumettre</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
