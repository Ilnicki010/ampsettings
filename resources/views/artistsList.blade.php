@extends('layouts.main')
@section('header-text')
    Browse all artists
@endsection
@section('content')
<ul class="artists-list">
    @foreach ($artists as $artist)
        <li class="artists-list__element" id="artistElement"><a href="{{route('artist', ['artist_name' => $artist->artist_name])}}">{{$artist->artist_name}}</a></li>
    @endforeach
</ul>
@endsection
