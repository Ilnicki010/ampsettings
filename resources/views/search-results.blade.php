@extends('layouts.main')
@section('header-text')
    Results for {{request()->get('search')}}
@endsection

@section('content')
@if (count($posts) > 0 || count($artists)>0 || count($users)>0)

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

@if (count($posts) > 0)
<div class="results">
    <h2 class="results__text">AMPSet's</h2>
    @foreach($posts as $post)
            @include('includes.post')
    @endforeach
</div>
@endif

@endsection
@else
    <div class="no-results">
        <img src="{{asset('assets/man-not-found@2x.png') }}" alt="" srcset="" width="10%" height="20%"  class="animated bounce">
        <div>
            <h1 class="no-results__text">Oops... We didn't find any AMP set's for {{request()->get('search')}} 😕</h1>
            <button class="header__add-button--no-results"><a href="{{route('create')}}">Add Yours!</a></button>
        </div>
    </div>
@endsection
@endif
