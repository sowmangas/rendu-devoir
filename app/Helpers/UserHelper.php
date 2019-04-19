<?php

use App\Enum\UserRole;
use Illuminate\Support\Facades\Auth;

if (!function_exists('isStudent')) {
    function isStudent()
    {
        return Auth::check() && Auth::user()->role === UserRole::ETUDIANT;
    }
}

if (!function_exists('isProf')) {
    function isProf()
    {
        return Auth::check() && Auth::user()->role === UserRole::PROF;
    }
}

if (!function_exists('isAdmin')) {
    function isAdmin()
    {
        return Auth::check() && Auth::user()->role === UserRole::ADMIN;
    }
}
