@component('mail::message')
# Introduction

# Hello {{ $user->prenom }} {{ $user->nom }}

# votre compte a été créer sous les infos:
    - Login: {{ $user->adresse_mel }}
    - Password: {{ $random }}

Merci de changer votre mot de passe a la première connexion.

Cordialement.<br>

{{ config('app.name') }}
@endcomponent
