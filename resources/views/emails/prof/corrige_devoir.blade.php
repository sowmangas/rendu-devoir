@component('mail::message')
# Bonjour {{ $etudiant->prenom }} {{ $etudiant->nom }}
@component('mail::button', ['url' => url('home')])
Votre devoir {{ $rendu->devoir->intitule }} de la matière  {{ $rendu->devoir->nom_matiere }} a été corrigé.
Vous avez eu {{ $rendu->note }}/20
@endcomponent

Cordialement!<br>
{{ config('app.name') }}
@endcomponent
