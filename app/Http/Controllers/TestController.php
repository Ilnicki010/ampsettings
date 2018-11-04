<?php
// For more details see: http://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::where('song_name','test')->paginate(1);
        return view('search-results', compact('posts'));
    }
}
// For more details see: http://laraget.com/blog/implementing-infinite-scroll-pagination-using-laravel-and-jscroll