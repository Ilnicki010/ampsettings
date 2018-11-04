@extends('layouts.main')
@section('header-text')
    Results for {{request()->get('search')}}
@endsection
@section('content')
<div class="infinite-scroll">
    @foreach($users as $user)
        <p>{{$user->nick}}</p>
    @endforeach
    @foreach($artists as $artist)
    @endforeach
    @if (count($posts) > 0)
    @foreach($posts as $post)
        <div class="media">
            <div class="post">
                    <div class="post__header">
                        <h1>{{$post->song_name}}</h1> by {{$post->artist->artist_name}}
                        Added by 
                        @if($post->user->nick === 'Stranger')
                            Stranger
                        @else
                        <a href="{{route('user', ['user_nick' => $post->user->nick])}}">{{$post->user->nick}}</a>
                        @endif
                    </div>
                    <div class="post__elements">
                        <div class="post__element">
                            <label>Gain</label>
                            <input type="text" value="{{$post->gain}}" class="dial" data-min="0" data-max="10" name='gain' data-readOnly=true>
                        </div>
                        <div class="post__element">
                            <label>Treble</label>
                            <input type="text" value="{{$post->treble}}" class="dial" data-min="0" data-max="10" name='treble' data-readOnly=true>
                        </div>
                        <div class="post__element">
                            <label>Middle</label>
                            <input type="text" value="{{$post->middle}}" class="dial" data-min="0" data-max="10" name='middle'data-readOnly=true >
                        </div>
                        <div class="post__element">
                                <label>Bass</label>
                                <input type="text" value="{{$post->bass}}" class="dial" data-min="0" data-max="10" name='bass' data-readOnly=true>
                            </div>
                        </div>
                    </div>
        </div>
    @endforeach
</div>

@endsection
@else
@section('content')
    <div class="no-results">
        <h1 class="no-results__text">Oops... We didn't find any AMP set's for {{request()->get('search')}} 😕</h1>
        <a href="{{route('create')}}" class="header__add-button header__add-button--no-results">Add Yours!</a>
    </div>
@endsection
@endif

