<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () { return redirect('/home'); });

Route::view('/welcome', 'welcome');

Route::view('/auth', 'auth.index');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'guest', 'prefix' => 'auth'], function () {
    Route::get('first_connexion', 'Auth\LoginController@firstConnexion')->name('auth.first_connexion');
    Route::post('first_connexion', 'Auth\LoginController@check');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::resource('formations', 'Admin\FormationController')->names([
            'create' => 'admin.formations.create',
            'store'  => 'admin.formations.store',
            'edit'   => 'admin.formations.edit',
            'update' => 'admin.formations.update',
            'index'  => 'admin.formations.index',
        ]);
        Route::resource('matiere', 'Admin\MatiereController')->names([
            'create' => 'admin.matiere.create',
            'store'  => 'admin.matiere.store',
            'edit'   => 'admin.matiere.edit',
            'update' => 'admin.matiere.update',
            'index'  => 'admin.matiere.index',
            'destroy'=> 'admin.matiere.destroy',
        ]);
        Route::resource('users', 'Admin\UserController')->names([
            'create' => 'admin.users.create',
            'index'  => 'admin.users.index',
            'store'  => 'admin.users.store',
            'edit'   => 'admin.users.edit',
            'update' => 'admin.users.update',
        ]);

        Route::put('users/{user}/unlock', 'Admin\UserController@unlock')->name('admin.users.unlock');
        Route::put('users/{user}/lock', 'Admin\UserController@lock')->name('admin.users.lock');
        Route::put('users/{user}/reset', 'Admin\UserController@reset')->name('admin.users.reset');
        Route::put('users/{user}/list', 'Admin\UserController@list')->name('admin.users.list');

        Route::resource('approb', 'Admin\ApprobationController')->names([
            'create' => 'admin.approb.create',
            'show'   => 'admin.approb.show',
            'store'  => 'admin.approb.store',
            'edit'   => 'admin.approb.edit',
            'update' => 'admin.approb.update',
        ]);
    });

    Route::group(['prefix' => 'prof', 'middleware' => 'prof'], function () {
        Route::resource('devoirs', 'Prof\DevoirController')->names([
            'create' => 'prof.devoirs.create',
            'store'  => 'prof.devoirs.store',
            'edit'   => 'prof.devoirs.edit',
            'show'   => 'prof.devoirs.show',
            'update' => 'prof.devoirs.update',
        ]);
        Route::resource('rendus', 'Prof\RenduController')->names([
            'update' => 'prof.rendus.update',
        ]);
        Route::put('devoirs/{id}/putVisible', 'Prof\DevoirController@putVisible')->name('prof.devoirs.putVisible');

        //Route::put('rendus/{id}/update', 'Prof\RenduController@update')->name('prof.rendus.update');
        Route::post('demande/modification/note',
            'Prof\ModificationNoteController@store')->name('prof.modification.note');
        Route::get('devoirsBy/matiere/{name}', 'Prof\DevoirController@devoirByMatiere')->name('prof.devoirs.matiere');
    });

    Route::group(['prefix' => 'etudiant', 'middleware' => 'etudiant'], function () {
        Route::resource('rendus', 'Etudiant\RenduController')->names([
            'create' => 'etudiant.rendus.create',
            'store'  => 'etudiant.rendus.store',
            'edit'   => 'etudiant.rendus.edit',
            'update' => 'etudiant.rendus.update',
        ]);

        Route::resource('devoirs', 'Etudiant\DevoirController')->names([
            'index' => 'etudiant.devoirs.index',
            'show'  => 'etudiant.devoirs.show',
        ]);
    });
});
