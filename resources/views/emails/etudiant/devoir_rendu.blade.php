@component('mail::message')
# Bonjour {{  Auth::user()->prenom }} {{  Auth::user()->nom }}

@component('mail::button', ['url' => url('home')])
Vous avez deposé le devoir {{ $rendu->devoir->intitule }} de la matière  {{ $rendu->devoir->nom_matiere }} avec succès.
@endcomponent

Cordialement!<br>
{{ config('app.name') }}
@endcomponent
