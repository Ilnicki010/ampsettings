@extends('layouts.main')
@section('header')
<header class="header">
    {{-- <h1 class="header__text">Hello there!</h1> --}}
    <img class="header__logo" src="{{ asset('assets/logo.png') }}" alt="">

    <form action="{{route('home')}}" method="POST" class="header__search-form header__search-form--main " autocomplete="off" style="margin-bottom:13vh">
            <input type="text" placeholder="Song, artist, user nick" class="header__search-form__input" name="search"/>
            <button type="submit" value="Search" class="header__search-form__submit" id='headerButton'>Search</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
<button class="header__add-button"><a href="{{route('create')}}">Add</a></button>
</header>
@endsection
@section('content')
   <div class="discover">
        <h1 class="discover__text">Discover</h1>
        <hr class="discover__hr"/>
        <div class="discover__items">
            <div class="discover__items__item " data-aos="fade-up">
                <a href="{{route('toprated')}}" style="color:#fff">
            <div class="discover__inner inner--one">
                <h1 class="discovery__items__item__text">Top Rated</h1>
            </div>
             </a>
            </div>
            <div class="discover__items__item " data-aos="fade-up">
                    <a href="{{route('latest')}}" style="color:#fff">
                    <div class="discover__inner inner--two">
                        <h1 class="discovery__items__item__text">Latest</h1>
                    </div>
                    </a>
            </div>
            <div class="discover__items__item " data-aos="fade-up">
                    <a href="{{route('artist.list')}}" style="color:#fff">
                <div class="discover__inner inner--three">
                    <h1 class="discovery__items__item__text">Artists</h1>
                </div>
                    </a>
            </div>
        </div>
   </div>
@endsection