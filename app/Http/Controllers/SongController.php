<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;


class SongController extends Controller
{
    public function getSong(Request $request)
    {
        $songData = new Song;
        $artistName = $request->artistName;
        $songName   = $request->songName;

        $url = "http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=6b1db1cd2169ea35f5b9d1ed15925bb8&artist=$artistName&track=$songName&format=json";

        $data = json_decode(file_get_contents($url),JSON_UNESCAPED_UNICODE);

         $songName     = $data->track->name;
         $artistName   = $data->track->artist->name;
         $tags         = json_encode($data->track->toptags->tag);
         $listeners    = $data->track->listeners;
         $plays        = $data->track->playcount;

        $songData = Song::firstOrCreate(
            [
            'artistName' => $artistName,
            'songName' => $songName,
            ],
            [
                'artistName' => $artistName,
                'songName' => $songName,
                'tags' => $tags,
                'listeners' => $listeners,
                'plays' => $plays,
            ]
        );
        $songData->save();

        return response()->json($songData);

    }

    public function getAllSongsByArtistName(Request $request){

        $artistName = $request->artistName;

        $allSongs = Song::select('songName')->where('artistName', '=', $artistName)->get();

        return response()->json($allSongs,);
    }

    public function getAllSongsByTag(Request $request){

        $tagName = $request->tagName;

        $allSongs = Song::select('ArtistName','songName')
                    ->whereJsonContains('tags', ['name' => $tagName ])
                    ->get();

        return response()->json($allSongs);
    }


}
