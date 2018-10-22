<?php
namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {

    public function postCratePost(Request $request){
        $post=new Post();
        $artist = new Artist();

        
        $this->validate($request,[
            'song_name'=>'required|max:128',
            'artist'=>'required|max:128',
        ]);
        


        $post->song_name=$request['song_name'];
        

        $post->gain=$request['gain'];
        $post->treble=$request['treble'];
        $post->bass=$request['bass'];
        $post->middle=$request['middle'];
        $post->likes=0;
        $post->user_id = rand();

        $getArtist = DB::table('artists')->where('artist_name','like','%'.$request['artist'].'%')->first();

            //var_dump($getArtist);
            if(isset($getArtist)){
                $post->artist_id = $getArtist->id; 
                if($post->save()){
                    return redirect()->back()->with(['message'=>'Ok added']);
                }
            }else{
               return redirect()->back()->with(['message'=>'Artist not exist']);;
           }
    }

    public function postSearchPost(Request $request){
        $this->validate($request,[
            'search'=>'required'
        ]);
        $posts=Post::all()->where('song_name',$request->search);
        if(isset($posts)){
            return view('search-results',['posts'=>$posts]);
        }else{
            echo 'XD';
        }
    }


}