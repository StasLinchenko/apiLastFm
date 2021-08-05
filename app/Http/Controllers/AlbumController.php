<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
   public function getAlbumSongs(Request $request)
   {
       $artistName = $request->artistName;
       $albumName = $request->albumName;

       $url = "http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=6b1db1cd2169ea35f5b9d1ed15925bb8&artist=$artistName&album=$albumName&format=json";

       $data = json_decode(file_get_contents($url));

       $albumName  = $data->album->name;
       $albumSongs = $data->album->tracks->track;
       $listeners  = $data->album->listeners;
       $plays      = $data->album->playcount;
       //dd($data);
       $albumSongsLenght = count($albumSongs);


        for($i = 0; $i < $albumSongsLenght; $i++){
            $albumSongsName [] = $albumSongs[$i]->name;
        }

        $songData = Album::firstOrCreate(
            [
                'albumName'  => $albumName,
            ],
            [
                'albumSongs' => json_encode($albumSongsName),
                'listeners'  => $listeners,
                'plays'      => $plays,
            ]
        );
        $songData->save();



        return response()->json($songData);
   }
}

