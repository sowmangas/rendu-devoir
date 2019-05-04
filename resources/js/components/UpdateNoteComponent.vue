<template>
    <a href="" @click.prevent.stop="askUpdate" class="btn btn-outline-danger btn-sm">Modifier</a>
</template>

<script>
    import axios from 'axios'

    export default {
        data () {
            return {}
        },
        props: {
            url: String,
            csrf: String,
            userid: Number,
            renduid: Number,
            oldnote: Number,
            oldcommentaire: String
        },
        methods: {
            askUpdate () {
                let note = prompt('Saisir la nouvelle note')
                let commentaire = prompt('Saisir le nouveau commentaire')
                let justif = prompt('Saisir un justificatif')

                if (this.empty(note) || this.empty(commentaire) || this.empty(justif)) return

                let data = {
                    'note': note,
                    'commentaire': commentaire,
                    '_csrf': this.csrf,
                    'user_id': this.userid,
                    'rendu_id': this.renduid,
                    'justif': justif,
                    'old_note': this.oldnote,
                    'old_commentaire': this.oldcommentaire
                }

                axios.post(this.url, data).then(
                    response => alert(response.data),
                    error => console.error(error)
                )
            },
            empty(stg) { return stg === '' },
            notEmpty(stg) { return !this.empty(stg) }
        },
        mounted () {
            console.log(this.url)
        }
    }
</script>
