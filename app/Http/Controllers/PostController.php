<?php
namespace App\Http\Controllers;

use App\Artist;
use App\Post;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function postCratePost(Request $request)
    {
        $post = new Post();
        $artist = new Artist();

        $this->validate($request, [
            'song_name' => 'required|max:128',
            'artist' => 'required|max:128',
        ]);

        $post->song_name = $request['song_name'];

        //basic settings
        $post->gain = $request['gain'];
        $post->treble = $request['treble'];
        $post->bass = $request['bass'];
        $post->middle = $request['middle'];
        //advanced settings
        $post->delay = $request['delay'];
        $post->distortion = $request['distortion'];
        $post->tremolo = $request['tremolo'];
        $post->flanger = $request['flanger'];
        $post->phazer = $request['phazer'];

        $post->rating = 0;
        if (Auth::user()) {
            $post->user_id = Auth::user()->id;
        } else {
            $post->user_id = 0;
        }

        $getArtist = DB::table('artists')->where('artist_name', 'like', '%' . $request['artist'] . '%')->first();

        //var_dump($getArtist);
        if (isset($getArtist)) {
            $post->artist_id = $getArtist->id;
            if ($post->save()) {
                return redirect()->back()->with(['message' => 'Ok added']);
            }
        } else {
            return redirect()->back()->with(['message' => 'Artist not exist']);
        }
    }

    public function postSearchPost(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);
        $posts = Post::all()->where('song_name', $request->search);
        //$users=User::all()->where('nick','like','%'.$request->search.'%');
        $users = DB::table('users')->where('nick', 'like', $request->search . '%')->get();
        $artists = Artist::all()->where('artist_name', $request->search);

        return view('search-results', ['posts' => $posts, 'users' => $users, 'artists' => $artists]);

    }
    public function getTopRated()
    {
        $posts = Post::all()->sortByDesc('rating')->take(10);
        return view('discover', ['posts' => $posts, 'type' => 'topRated']);
    }
    public function getLatest()
    {
        $posts = Post::all()->sortByDesc('created_at')->take(10);
        return view('discover', ['posts' => $posts, 'type' => 'latest']);
    }

    public function postRate(Request $request)
    {
        $rating_given = $request['rating'];
        $post_id = $request['postId'];
        $post = Post::find($post_id);
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $user = Auth::user();
        } else {
            return null;
        }
        if (!$post) {
            return null;
        }
        $rating = $user->ratings()->where('post_id', $post_id)->first();
        if (isset($rating)) {
            $already_rating = $rating->$rating;
            $update = true;
        } else {
            $update = false;
            $rating = new Rating();
        }
        $rating->rate = $rating_given;
        $rating->post_id = $post->id;
        $rating->user_id = $user_id;
        if ($update) {
            $rating->update();
        } else {
            $rating->save();
        }
        $post->rating = $this->getRate($post_id);
        $post->update();
        return null;
    }
    public function getRate($post_id)
    {
        $rate = 0;
        $ratings = Rating::all()->where('post_id', $post_id);
        foreach ($ratings as $rating) {
            $rate += $rating->rate;
        }
       
        $rate = $rate / count($ratings);
        return $rate;
    }

}
