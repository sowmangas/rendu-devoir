<template>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-t-0 p-b-30">
                <form class="login100-form validate-form" method="post" @submit.prevent.stop="register">
                    <span class="login100-form-title p-t-20 p-b-45">Inscrivez-vous</span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">
                        <label for="nom"></label>
                        <input id="nom" class="input100" type="text" name="nom" v-model="nom" placeholder="Nom" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">
                        <label for="prenom"></label>
                        <input id="prenom" class="input100" type="text" name="prenom" v-model="prenom" placeholder="Prénom" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire">
                        <label for="adresse_mel"></label>
                        <input id="adresse_mel" class="input100" type="text" name="adresse_mel" v-model="adresse_mel" placeholder="Email" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10">
                        <label for="role" class="sr-only"></label>
                        <select class="input100" id="role" name="role" v-model="role">
                            <option value="admin">Admin</option>
                            <option value="prof">Professeur</option>
                            <option value="etudiant">Etudiant</option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" v-if="role === 'etudiant'">
                        <label for="formation" class="sr-only"></label>
                        <select class="input100" id="formation" name="role" v-model="formation_id">
                            <option :value="formation.id" v-for="formation in formations">
                                {{ formation.nom_formation }}
                            </option>
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Champ obligatoire" v-else v-model="titre">
                        <label for="title"></label>
                        <input class="input100" id="title" type="text" name="titre" placeholder="Titre" autofocus>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10">
                        <label for="password" class="sr-only"></label>
                        <input id="password" class="input100" type="password" name="password" placeholder="Mot de pass" v-model="password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="fa fa-lock"></i></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10">
                        <label for="password_confirmation" class="sr-only"></label>
                        <input id="password_confirmation" class="input100" type="password" name="password_confirmation" placeholder="Confirmez le mot de pass" v-model="password_confirmation">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>

                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn">Inscription</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                formations: [],
                role: "admin",
                formation_id: "",
                nom: "",
                prenom: "",
                adresse_mel: "",
                titre: "",
                password: "",
                password_confirmation: ""
            }
        },
        props: {
            url: String
        },
        methods: {
            register() {
                let options = {
                    "nom": this.nom,
                    "prenom": this.prenom,
                    "adresse_mel": this.adresse_mel,
                    "titre": this.titre,
                    "role": this.role,
                    "formation_id": this.formation_id,
                    "password": this.password,
                    "password_confirmation": this.password_confirmation,
                    // "_token": document.head.querySelector('meta[name="csrf-token"]').content,
                }

                axios.post(this.url, options).then(response => {
                    window.location.href = '/home'
                }, error => {
                    console.log(error)
                })
            },
            getFormation() {
                axios.get(this.url).then(response => {
                    this.formations = response.data
                }, error => {
                    console.log(error)
                })
            }
        },
        mounted () {
            this.getFormation()
        }
    }
</script>
