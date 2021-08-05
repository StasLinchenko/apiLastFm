<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/artist/{artistName}', 'App\Http\Controllers\ArtistController@getArtist');
Route::get('/artist/{artistName}/song/{songName}', 'App\Http\Controllers\SongController@getSong');
Route::get('/artist/{artistName}/album/{albumName}', 'App\Http\Controllers\AlbumController@getAlbumSongs');

Route::get('/songs/{artistName}', 'App\Http\Controllers\SongController@getAllSongsByArtistName');
Route::get('/songs/{tagName}', 'App\Http\Controllers\SongController@getAllSongsByTag');

Route::get('/chart/{condition}','App\Http\Controllers\ChartController@getChart');
