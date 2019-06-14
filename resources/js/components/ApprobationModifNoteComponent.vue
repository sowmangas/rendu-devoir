<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Professeur</th>
                        <th class="text-center">titre</th>
                        <th class="text-center">Etudiant</th>
                        <th class="text-center">Ancienne Note</th>
                        <th class="text-center">Nouvelle Note</th>
                        <th class="text-center">Commentaire corrigé</th>
                        <th class="text-center">Justificatif</th>
                        <th class="text-center" colspan="2">Options</th>
                    </tr>
                    </thead>

                    <tbody>
<!--                    <form method="post"-->
<!--                          onsubmit="return confirm('Vous êtes sur le point de confirmer une modification de note, \n l\'opération est irreversible.\n Êtes-vous sûr ?')">-->
                        <tr class="text-center" v-for="modificationNote in modificationNotes">
                            <td id="id_appro" hidden>{{ modificationNote.id }}</td>
                            <td id="id_rendu" hidden>{{ modificationNote.rendu_id }}</td>
                            <td v-if="modificationNote.professeur"> {{ modificationNote.professeur.prenom }} {{modificationNote.professeur.nom}}</td>
                            <td v-if="modificationNote.professeur">{{ modificationNote.professeur.titre }}</td>
                            <td v-if="modificationNote.etudiant">{{ modificationNote.etudiant.prenom }} {{ modificationNote.etudiant.nom }}</td>
                            <td>{{ modificationNote.old_note }}</td>
                            <td id="notenew">{{ modificationNote.note }}</td>
                            <td id="commentairenew" >{{ modificationNote.commentaire }}</td>
                            <td>{{ modificationNote.justif}}</td>
                            <td >
                                <a href="" @click="askApproved" class="btn btn-default btn-sm">Approuver</a>
                            </td>
                            <td >
                                <a href="" @click="askRejected" class="btn btn-danger btn-sm">Rejeter</a>
                            </td>
                        </tr>
<!--                    </form>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {

        data () {
            return {
                modificationNotes: []
            }
        },
        props: {
            url: String
        },
        methods: {
            askApproved () {
                let appro_id = $(id_appro).text()
                let rendu_id =$(id_rendu).text()
                let note =$(notenew).text()
                let commentaire=$(commentairenew).text()

                let url='admin.approb.update'
                let status='ok'
                //if (this.empty(note) || this.empty(commentaire) ) return

                let data = {
                    'status':      status,
                    'appro_id':    appro_id,
                    'rendu_id':    rendu_id,
                    'note':        note,
                    'commentaire': commentaire
                }

                axios.put(url, data).then(
                    response => alert(response.data),
                    error => console.error(error)
                )
            },
            askRejected () {
                let appro_id = $(id_appro).text()
                let note =$(notenew).text()
                let commentaire=$(commentairenew).text()
                let url='admin.approb.update'
                let status='rejected'
                //if (this.empty(note) || this.empty(commentaire) ) return

                let data = {
                    'status':      status,
                    'appro_id':    appro_id,
                    'note':        note,
                    'commentaire': commentaire
                }

                axios.put(url, data).then(
                    response => alert(response.data),
                    error => console.error(error)
                )
            }
        },
            mounted () {
                axios.get(this.url).then(
                    response => this.modificationNotes = response.data,
                    error => console.log(error)
                )
            }

    }
</script>

<style scoped>

</style>
