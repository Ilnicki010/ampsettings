@extends('layouts.main')

@section('title')
    Welcome!
    @endsection
@section('content')
    @include('includes.message-block')
    <div class="join_container">
            <img src="{{ asset('assets/man@2x.png') }}" alt="" width="20%" height="60%" class="join__man">
        <div class="sign-up">
            <h3 class="sign-up__text">Sign Up</h3>
            <form action="{{route('signup')}}" method="post" class="form form--sign">
                <div class="form--sign-group">
                    <label class="form--sign-group__label" for="email">Your email</label>
                    <input class="form--sign-group__input" type="text" name="email" id="email" value="{{Request::old('email')}}" placeholder="eg. john@doe.com">
                </div>
                <div class="form--sign-group">
                    <label class="form--sign-group__label"  for="nick">Nick</label>
                    <input class="form--sign-group__input"type="text" name="nick" id="nick" value="{{Request::old('nick')}}" placeholder="eg. john232">
                </div>
                <div class="form--sign-group">
                    <label class="form--sign-group__label"  for="password">Your password</label>
                    <input class="form--sign-group__input" type="password" name="password" id="password">
                </div>
                <div class="form--sign-group">
                    <label class="form--sign-group__label"  for="password_confirmation">Repeat password</label>
                    <input class="form--sign-group__input" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <button type="submit" class="form--sign__submit">Sign Up</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
        <div class="sign-in">
            <h3 class="sign-in__text">Sign In</h3>
            <form action="{{route('signin')}}" method="post" class="form form--sign">
                <div class="form--sign-group">
                    <label class="form--sign-group__label"  for="email">Your email</label>
                    <input class="form--sign-group__input" type="text" name="email" id="email">
                </div>
                <div class="form--sign-group">
                    <label class="form--sign-group__label"  for="password">Your password</label>
                    <input class="form--sign-group__input" type="password" name="password" id="password">
                </div>
                <a href="#">Forgot password?</a>
                <button type="submit" class="form--sign__submit">Sign In</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </div>
@endsection