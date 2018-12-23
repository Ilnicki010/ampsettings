<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function get401()
    {
        return view('401');
    }
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'nick' => 'required|max:120|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);

        $email = $request['email'];
        $nick = $request['nick'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->nick = $nick;
        $user->password = $password;
        if ($user->save()) {
            return redirect()->route('home');
        }

    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request['email'];
        $password = $request['password'];
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('home');}
        return redirect()->back();
    }
    public function getUserProfile($user_nick)
    {
        $user = User::where('nick', $user_nick)->first();

        $posts = Post::all()->where('user_id', $user->id);

        return view('profile', ['posts' => $posts], ['author' => $user]);
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

}
