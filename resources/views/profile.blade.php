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
    @include('includes.post')
@endforeach
@endsection