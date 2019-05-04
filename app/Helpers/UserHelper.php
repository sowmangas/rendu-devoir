<?php

use App\Enum\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


if (!function_exists('setActiveRoot')) {
    function setActiveRoot($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}
