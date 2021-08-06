<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function getArtist(Request $request)
    {

        $artistName = $request->artistName;

        if(Artist::where('artistName', '=', $artistName)
                ->exists()) {
            $songData = Artist::select('*')
                                ->where('artistName', '=', $artistName)
                                ->get();

            return response()->json($songData);

        }else{

            $url = "http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist=$artistName&api_key=6b1db1cd2169ea35f5b9d1ed15925bb8&format=json";

            $data = json_decode(file_get_contents($url));

            $artistName = $data->artist->name;
            $tags       = json_encode($data->artist->tags->tag);
            $listeners  = $data->artist->stats->listeners;
            $plays      = $data->artist->stats->playcount;

            $artistData = new Artist;
            $artistData = Artist::firstOrCreate(
                ['artistName' => $artistName],
                [
                    'artistName' => $artistName,
                    'tags' => $tags,
                    'listeners' => $listeners,
                    'plays' => $plays
                ],

            );
            $artistData->save();

            return response()->json($artistData);
        }
    }
}
