<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/artist/{artistName}','App\Http\Controllers\ArtistController@getArtist');
// Route::get('/artist/{artistName}/song/{songName}','App\Http\Controllers\SongController@getSong');
// Route::get('/songs/{artistName}','App\Http\Controllers\SongController@getAllSongsByArtistName');
// Route::get('/tags/{tagName}','App\Http\Controllers\SongController@getAllSongsByTag');
// Route::get('/artist/{artistName}/album/{albumName}','App\Http\Controllers\AlbumController@getAlbum');
