<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchArtists(Request $request)
    {
        $search = Artist::where('artist_name', 'LIKE', '%' . $request->q . '%')->get();

        foreach ($search as $v) {
            $return_array[] = ["value" => $v->artist_name, "data" => $v->artist_name];
        }

        return response()->json(array("suggestions" => $return_array));

    }
    public function searchSong(Request $request)
    {

        $search = Post::where('song_name', 'LIKE', '%' . $request->q . '%')->get();
        $tmp = '';
        foreach ($search as $v) {
            if ($v->song_name) {
                if ($v->song_name != $tmp) {
                    $return_array[] = ["value" => $v->song_name . " by " . $v->artist->artist_name, "data" => $v->song_name];
                    $tmp = $v->song_name;
                }
            }

        }

        return response()->json(array("suggestions" => $return_array));

    }
}
