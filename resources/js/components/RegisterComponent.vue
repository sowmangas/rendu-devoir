<template>

    <div class="row">
        <!-- col -->
        <div class="col-sm-8">

            <div class="blok">
                <header class="blok-heading">
                    <h3 class="blok-title"> Formulaire de création d'utilisateur </h3>
                </header>

                <article class="article">

                    <form @submit.prevent.stop="register">

                        <div class="form-group has-error">
                            <label for="nom" class="sr-only"></label>
                            <input id="nom" class="form-control" type="text" name="nom" v-model="nom" placeholder="Nom">
                        </div>

                        <div class="form-group">
                            <label for="prenom" class="sr-only"></label>
                            <input id="prenom" class="form-control" type="text" name="prenom" v-model="prenom"
                                   placeholder="Prénom">
                        </div>

                        <div class="form-group">
                            <label for="adresse_mel" class="sr-only"></label>
                            <input id="adresse_mel" class="form-control" type="text" name="adresse_mel"
                                   v-model="adresse_mel" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="role" class="sr-only"></label>
                            <select class="form-control" id="role" name="role" v-model="role">
                                <option value="Admin">Admin</option>
                                <option value="Professeur">Professeur</option>
                                <option value="Etudiant">Etudiant</option>
                            </select>
                        </div>

                        <div class="form-group" v-if="role === 'Etudiant'">
                            <label for="formation" class="sr-only"></label>
                            <select class="form-control" id="formation" name="role" v-model="formation_id">
                                <option disabled value="">Veuillez choisir une formation</option>
                                <option :value="formation.id" v-for="formation in formations">
                                    {{ formation.nom_formation }}
                                </option>
                            </select>
                        </div>

                        <div class="form-group" data-validate="Champ obligatoire" v-else>
                            <label for="title" class="sr-only"></label>
                            <input class="form-control" id="title" type="text" v-model="titre" name="titre" placeholder="Titre">
                        </div>

                        <button class="pull-right btn btn-default">Inscrire</button>

                    </form>
                </article>
            </div><!-- blok // -->

        </div><!-- col // -->

        <div class="col-sm-4">
            <ul v-for="error in errors">
                <li>{{ error.join('\n') }}</li>
            </ul>
        </div>

    </div>

</template>

<script>
    import axios from 'axios'

    export default {
        data () {
            return {
                errors: [],
                formations: [],
                role: 'Admin',
                formation_id: '',
                nom: '',
                prenom: '',
                adresse_mel: '',
                titre: '',
                password: '',
                password_confirmation: ''
            }
        },
        props: {
            url: String
        },
        methods: {
            register () {
                let options = {
                    'nom': this.nom,
                    'prenom': this.prenom,
                    'adresse_mel': this.adresse_mel,
                    'titre': this.titre,
                    'role': this.role,
                    'formation_id': this.formation_id,
                    '_token': document.head.querySelector('meta[name="csrf-token"]').content
                }

                console.log(options)

                axios
                    .post(this.url, options)
                    .then(response => console.log(response) )
                    .catch(error => this.errors = error.response.data.errors )
            },
            getFormation () {
                axios.get(this.url).then(response => {
                    this.formations = response.data
                }, error => {
                    console.log(error)
                })
            },
            isEmpty (string) {
                return string.length <= 0
            },
            isNotEmpty (string) {
                return !this.isEmpty(string)
            }
        },
        mounted () {
            this.getFormation()
        }
    }
</script>
