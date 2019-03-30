<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

<<<<<<< HEAD
=======
/*Route::get('/', function () {
    return view('welcome');
})->middleware('/auth');*/
Route::get('/', function () {
    return view('auth.index');
});

>>>>>>> d3ca2aa273b597a1397f8af4c2b3306d2841c171
Auth::routes();
Route::view('/', 'welcome')->middleware('auth');
Route::view('/auth','auth.index');
Route::get('/home', 'HomeController@index')->name('home');
