<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function getAristSite(Request $request)
    {
        $artist = Artist::where('artist_name', $request->artist_name)->first();
        $posts = Post::where('artist_id', $artist->id)->get();

        return view('discover', ['posts' => $posts, 'artist' => $artist, 'type' => 'artist']);

    }
    public function getAristList()
    {
        $artists = Artist::orderBy('artist_name', 'asc')->get();

        return view('artistsList', ['artists' => $artists]);

    }
}
