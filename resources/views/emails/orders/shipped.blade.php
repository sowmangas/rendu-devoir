@component('mail::message')
# Bonjour {{ $user->prenom }} {{ $user->nom }}

@component('mail::button', ['url' => url('home')])
Un devoir vient d'être ajouté pour la matière {{ $devoir->nom_matiere }}.
@endcomponent

Cordialement!<br>
{{ config('app.name') }}
@endcomponent
