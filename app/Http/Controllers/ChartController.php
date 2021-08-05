<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;

class ChartController extends Controller
{
    public function getChart(Request $request) {
        $condition = $request->condition;

        if($condition == 'album')
        {
            $albumChart =  Album::select('albumName','listeners','plays')
            ->orderBy('listeners','desc')
            ->orderBy('plays','desc')
            ->get();

            return response()->json($albumChart);
        }

        if($condition == 'artist')
        {
            $artistChart =  Artist::select('artistName','listeners','plays')
            ->orderBy('listeners','desc')
            ->orderBy('plays','desc')
            ->get();

            return response()->json($artistChart);
        }

        if($condition == 'song')
        {
            $songChart =  Song::select('songName','listeners','plays')
            ->orderBy('listeners','desc')
            //->orderBy('plays','desc')
            ->get();

            return response()->json($songChart);
        }
    }
}
