@extends('layouts.main')
@if ($type === 'topRated')
    <h1 class="discoversite__text" id="#discoversite-text">10 Top Rated</h1>
@endif
@if(($type === 'latest'))
    <h1 class="discoversite__text" id="#discoversite-text">10 Latest</h1>
@endif

@section('content')
<div class="results">
    @foreach($posts as $post)
            @include('includes.post')
    @endforeach
</div>
@endsection

