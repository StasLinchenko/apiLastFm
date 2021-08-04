<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    public function getSong(Request $request)
    {
        $artistData = new Song;
        $artistName = $request->artist->artistName;
        $songName   = $request->songName;

        $url = "http://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=6b1db1cd2169ea35f5b9d1ed15925bb8&artist=$artistName&track=$songName&format=json";

        $data = json_decode(file_get_contents($url));

        dd($data);
        // dd($data);

        // $artistName = $data->artist->name;
        // $tags       = json_encode($data->artist->tags->tag);
        // $listeners  = $data->artist->stats->listeners;
        // $plays      = $data->artist->stats->playcount;

        // $artistData = Artist::firstOrCreate(
        //     ['singerName' => $artistName,
        //     'tags' => $tags,
        //     'listeners' => $listeners,
        //     'plays' => $plays
        //     ],

        // );
        // $artistData->save();

        // return $artistData;
    }
}
