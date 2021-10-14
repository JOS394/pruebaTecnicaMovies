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
Route::view('movies/index', 'movies.index')->name('movies.create')->middleware('auth');
Route::resource('movies','MovieController');
Route::post('store', 'MovieController@store')->name('addMovie');
Route::get('movies/index','MovieController@index')->name('movies.index')->middleware('auth');

