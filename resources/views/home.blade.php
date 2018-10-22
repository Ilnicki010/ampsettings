@extends('layouts.main')

<header class="header">
    <h1 class="header__text">Hello there, let's play it</h1>
    <form action="{{route('home')}}" method="POST" class="header__search-form">
            <input type="text" placeholder="Song name..." class="header__search-form__input" name="search"/>
            <input type="submit" value="Search" class="header__search-form__submit">
            <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
<a href="{{route('create')}}" class="header__add-button">Add</a>
</header>
@section('content')
   <div class="discover">
        <h1 class="discover__text">Discover</h1>
        <hr class="discover__hr"/>
        <div class="discover__items">
            <div class="discover__items__item animated bounceInUp delay-2s">
                <h1 class="discovery__items__item__text">Top Rated</h1>
            </div>
            <div class="discover__items__item animated bounceInUp">
                <h1 class="discovery__items__item__text">Latest</h1>
            </div>
            <div class="discover__items__item animated bounceInUp delay-1s">
                <h1 class="discovery__items__item__text">Artists</h1>
            </div>
        </div>
   </div>
@endsection