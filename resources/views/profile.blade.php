@extends('layouts.main')
<header class="header header--profile" id="headerProfile">
    <h1 class="header__text">{{$author->nick}}</h1>
</header>
@section('content')
@foreach($posts as $post)
    @include('includes.post')
@endforeach
@endsection