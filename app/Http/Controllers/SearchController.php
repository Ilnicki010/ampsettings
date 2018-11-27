<?php

namespace App\Http\Controllers;
use App\Post;
use App\Artist;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class SearchController extends Controller
{
    public function searchArtists(Request $request){
    $search = Artist::where('artist_name', 'LIKE', '%'.$request->q.'%')->get();
    
        foreach($search as $v)
{
  $return_array[] =  ["value"=>$v->artist_name,"data"=>$v->artist_name];
}

return response()->json(array("suggestions"=>$return_array));
    
    }
}
?>