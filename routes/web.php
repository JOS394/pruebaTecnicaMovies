<?php

use Illuminate\Support\Facades\Route;
use App\Movies;
use App\User;

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

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('registrado/home', 'MovieController@index')->name('registrado.home');

Route::view('admin/panel', 'admin.panel')->name('admin.panel')->middleware('auth');

Route::view('movies/create', 'movies.create')->name('movies.create')->middleware('auth');
Route::view('movies/index', 'movies.index')->name('movies.index')->middleware('auth');
// Route::view('movies/edit', 'movies.edit')->name('movies.edit')->middleware('auth');
Route::get('movies/{id}/edit','MovieController@edit')->name('movie.edit')->middleware('auth');
// Route::patch('movies/{id}/edit','MovieController@update')->name('movie.update')->middleware('auth');

Route::resource('movies','MovieController');





Route::resource('users','UserController');
Route::view('usuarios/index', 'usuarios.index')->name('usuarios.index')->middleware('auth');
Route::view('users/create', 'usuarios.create')->name('usuarios.create')->middleware('auth');
Route::get('users/{id}/edit','UserController@edit')->name('usuarios.edit')->middleware('auth');

Route::post('store', 'MovieController@store')->name('addMovie');
// Route::get('movies/index','MovieController@index')->name('movies.index')->middleware('auth');

