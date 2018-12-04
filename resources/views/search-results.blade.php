@extends('layouts.main')
@section('header-text')
    Results for {{request()->get('search')}}
@endsection
@section('content')
@if (count($posts || $artists || $users) > 0)


@if (count($artists) > 0)
<div class="artists">
        <h2 class="results__text">Artists</h2>
        <div class="artists__list">
            @foreach($artists as $artist)
                <div class="artists__artist"> 
                    <p>{{$artist->artist_name}}</p>
                </div>
            @endforeach
        </div>
</div>
@endif
@if (count($users) > 0)
<div class="users">
        <h2 class="results__text">Users</h2>
        <div class="users__list">
            @foreach($users as $user)
            <a class="users__user" href="{{route('user', ['user_nick' => $user->nick])}}">
                <div> 
                   {{$user->nick}}
                </div>
            </a>
            @endforeach
        </div>
</div>
@endif
<div class="results">
    <h2 class="results__text">AMPSet's</h2>
    @foreach($posts as $post)
            <div class="post" data-postid={{$post->id}}>
                    <div class="post__header">
    
                        <h1>{{$post->song_name}}</h1> by {{$post->artist->artist_name}}
                        Added by 
                        @if ($post->user_id === 0)
                        <span>Stranger</span>
                        @else
                        
                        @endif
                        {{-- @if($post->user->verified)
                            <i class="fas fa-check-circle"></i>
                        @endif --}}
        
                    <div class="post__rating">
                        @include('includes.rating')
                    </div>
                    </div>
                    <div class="post__elements">
                        <div class="post__element">
                            <label>Gain</label>
                            <input type="text" value="{{$post->gain}}" class="dial" data-min="0" data-max="10" name='gain' data-readOnly=true data-width=70 data-height=70>
                        </div>
                        <div class="post__element">
                            <label>Treble</label>
                            <input type="text" value="{{$post->treble}}" class="dial" data-min="0" data-max="10" name='treble' data-readOnly=true data-width=70 data-height=70>
                        </div>
                        <div class="post__element">
                            <label>Middle</label>
                            <input type="text" value="{{$post->middle}}" class="dial" data-min="0" data-max="10" name='middle'data-readOnly=true data-width=70 data-height=70 >
                        </div>
                        <div class="post__element">
                                <label>Bass</label>
                                <input type="text" value="{{$post->bass}}" class="dial" data-min="0" data-max="10" name='bass' data-readOnly=true data-width=70 data-height=70>
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
