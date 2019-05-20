@component('mail::message')
# Bonjour {{ $prof->prenom }} {{ $prof->nom }}
@component('mail::button', ['url' => url('home')])
Un devoir vient d'être rendu pour {{ $rendu->devoir->intitule }} de la matière  {{ $rendu->devoir->nom_matiere }}.
@endcomponent

Cordialement!<br>
{{ config('app.name') }}
@endcomponent
