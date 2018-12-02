@extends('layouts.main')
@if(isset($author->nick))
<header class="header header--profile" id="headerProfile">
    <h1 class="header__text">{{$author->nick}}</h1>
</header>
@endif
@if(isset($author->artist_name))
<header class="header header--artist" id="headerProfile">
        <h1 class="header__text">{{$author->artist_name}}</h1>
    </header>
@endif
@section('content')
@foreach($posts as $post)
<div class="post">
    <div class="post__header">
        <h1>{{$post->song_name}}</h1> by {{$post->artist->artist_name}}
        Added by {{$post->user->nick}}
        <div class="post__rating">
                @include('includes.rating')
            </div>
    </div>
    <div class="post__elements">
        <div class="post__element">
            <label>Gain</label>
            <input type="text" value="{{$post->gain}}" class="dial" data-min="0" data-max="10" name='gain' data-readOnly=true data-width=100 data-height=100>
        </div>
        <div class="post__element">
            <label>Treble</label>
            <input type="text" value="{{$post->treble}}" class="dial" data-min="0" data-max="10" name='treble' data-readOnly=true data-width=100 data-height=100>
        </div>
        <div class="post__element">
            <label>Middle</label>
            <input type="text" value="{{$post->middle}}" class="dial" data-min="0" data-max="10" name='middle'data-readOnly=true data-width=100 data-height=100>
        </div>
        <div class="post__element">
                <label>Bass</label>
                <input type="text" value="{{$post->bass}}" class="dial" data-min="0" data-max="10" name='bass' data-readOnly=true data-width=100 data-height=100>
            </div>
        </div>
    </div>
@endforeach
@endsection