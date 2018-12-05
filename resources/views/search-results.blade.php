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
            @include('includes.post')
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
