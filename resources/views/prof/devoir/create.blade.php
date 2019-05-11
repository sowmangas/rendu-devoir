@extends('layouts.base', ['title' => 'Création devoir'])

@section('content')
    <div class="row">
        <div class="offset-2 col-md-8">
            <h1>Formulaire de creation d'un devoir</h1>
            <form action="{{ route('prof.devoirs.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="formation_id" class="sr-only">Formation</label>
                    <select type="text" name="formation_id" id="formation_id" class="form-control ">
                        <option disabled selected>Selectionner une formation</option>
                        @foreach($formations as $formation)
                            <option value="{{ old('formation_id') ?: $formation->id }}">
                                {{ $formation->nom_formation }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" data-validate="Champ obligatoire">
                    <label for="nom_matiere" class="sr-only">Nom de la matiere</label>
                    <select id="nom_matiere" class="form-control" name="nom_matiere">
                        <option value="Choisir la matière" disabled selected>Choisir la matière</option>
                        @foreach($matieres as $matiere)
                            <option value="{{ $matiere->nom_matiere }}">{{ $matiere->nom_matiere }}</option>
                        @endforeach
                    </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        </span>
                    @if ($errors->has('matiere'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('matiere') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="intitule" class="sr-only">Nom de la formation</label>
                    <input type="text" name="intitule" id="intitule" class="form-control"
                           placeholder="Saisissez l'intitulé du devoir" value="{{ old('intitule') }}">
                </div>

                <div class="form-group">
                    <label for="evaluer" class="form-check-inline">
                        Cocher si dévoir évalué
                        <input type="checkbox" name="evaluer" id="evaluer" class="form-control -align-left">
                    </label>

                </div>

                <div class="form-group" data-validate="Champ obligatoire">
                    <label for="type_correction" class="sr-only">Type de la correction</label>
                    <select id="type_correction" class="form-control" name="type_correction">
                        <option value="" disabled selected>Choisir le type de la correction</option>
                        <option value=1>Corrigé type</option>
                        <option value=0>Pas de corrigé type</option>
                    </select>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        </span>
                    @if ($errors->has('type_correction'))
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('type_correction') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group" id="corrige_input" style="display: none;">
                    <label for="corrige_type">Selectionner le corrigé type <i>La taille maximal du fichier est de
                            2MB</i></label>
                    <input type="file" name="corrige_type" id="corrige_type" class="form-control form-control-sm"
                           value="{{ old('corrige_type') }}">
                </div>

                <div class="form-group">
                    <label for="date_limit_depot">Date limite</label>
                    <input type="date" name="date_limit_depot" id="date_limit_depot" class="form-control"
                           placeholder="Saisissez le nom de la formation" value="{{ old('date_limit_depot') }}">
                </div>

                <div class="form-group">
                    <label for="enonce">Selectionner l'énoncé <i>La taille maximal du fichier est de 2MB</i></label>
                    <input type="file" name="enonce" id="enonce" class="form-control" value="{{ old('enonce') }}">
                </div>

                <div class="form-group">
                    <label for="periode" class="sr-only">Semestre de formation</label>
                    <select name="periode" id="periode" class="form-control">
                        <option disabled selected value="">Choisir le semestre</option>
                        <option value="S1-{{ now()->year }}">Semestre 1</option>
                        <option value="S2-{{ now()->year }}">Semestre 2</option>
                    </select>
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('vue')@stop

@section('js')
    @parent

    <script>

        $("#type_correction").change(function(){
            var selectedTypeCorrection = $(this).children("option:selected").val();
            if (selectedTypeCorrection ==1) {
                $('#corrige_input').show()
            }
            else {
                $('#corrige_input').hide()
            }
        });
    </script>
@stop
