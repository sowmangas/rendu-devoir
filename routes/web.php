<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::view('/', 'auth.index');
Route::view('/', 'welcome')->middleware('auth');
Route::view('/auth','auth.index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::resource('formations', 'Admin\FormationController')->names([
            'create' => 'admin.formations.create',
            'store'  => 'admin.formations.store',
            'edit'   => 'admin.formations.edit',
            'update' => 'admin.formations.update',
        ]);
    });

    Route::group(['prefix' => 'prof', 'middleware' => 'prof'], function () {
        Route::resource('devoirs', 'Prof\DevoirController')->names([
            'create' => 'prof.devoirs.create',
            'store'  => 'prof.devoirs.store',
            'edit'   => 'prof.devoirs.edit',
            'update' => 'prof.devoirs.update',
        ]);
    });

    Route::group(['prefix' => 'etudiant', 'middleware' => 'etudiant'], function () {
        Route::resource('rendus', 'Etudiant\RenduController')->names([
            'create' => 'etudiant.rendus.create',
            'store'  => 'etudiant.rendus.store',
            'edit'   => 'etudiant.rendus.edit',
            'update' => 'etudiant.rendus.update',
        ]);
    });
});
