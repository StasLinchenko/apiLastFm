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
        $stat = $request->stat;

        if($condition == 'album')
        {
            switch ($stat){

                case 'listeners':

                    $chart = Album::select('albumName','listeners','plays')
                                ->orderBy('listeners','desc')
                                ->get();

                    return response()->json($chart);

                break;

                case 'plays':

                    $chart = Song::select('albumName','listeners','plays')
                                ->orderBy('plays','desc')
                                ->get();

                    return response()->json($chart);

                break;
            }
        }

        if($condition == 'artist')
        {
            switch ($stat){

                case 'listeners':

                    $chart = Artist::select('artistName','listeners','plays')
                                ->orderBy('listeners','desc')
                                ->get();

                    return response()->json($chart);

                break;

                case 'plays':

                    $chart = Artist::select('artistName','listeners','plays')
                                ->orderBy('plays','desc')
                                ->get();

                    return response()->json($chart);

                break;
            }
        }

        if($condition == 'song')
        {
            switch ($stat){

                case 'listeners':
                    $chart = Song::select('songName','listeners','plays')
                                ->orderBy('listeners','desc')
                                ->get();

                    return response()->json($chart);

                break;

                case 'plays':
                    $chart = Song::select('songName','listeners','plays')
                                ->orderBy('plays','desc')
                                ->get();

                    return response()->json($chart);

                break;
            }
        }
    }
}
