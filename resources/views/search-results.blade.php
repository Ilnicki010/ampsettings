@extends('layouts.main')
@section('header-text')
    Results for {{request()->get('search')}}
@endsection
@section('content')
@if(count($posts) == 0)
                <header><h4>No songs found</h4></header>
            @endif
            @foreach($posts as $post)
                <h1>{{$post->song_name}}</h1> by {{$post->artist->artist_name}}
                <div class="form__elements__knobs">
                        <div class="form__elements__element form__elements__element--knob">
                            <label>Gain</label>
                            <input type="text" value="{{$post->gain}}" class="dial" data-min="0" data-max="10" name='gain' data-readOnly=true>
                        </div>
                        <div class="form__elements__element form__elements__element--knob">
                            <label>Treble</label>
                            <input type="text" value="{{$post->treble}}" class="dial" data-min="0" data-max="10" name='treble' data-readOnly=true>
                        </div>
                        <div class="form__elements__element form__elements__element--knob">
                            <label>Middle</label>
                            <input type="text" value="{{$post->middle}}" class="dial" data-min="0" data-max="10" name='middle'data-readOnly=true >
                        </div>
                        <div class="form__elements__element form__elements__element--knob">
                                <label>Bass</label>
                                <input type="text" value="{{$post->bass}}" class="dial" data-min="0" data-max="10" name='bass' data-readOnly=true>
                            </div>
                            
                    </div>
            @endforeach
@endsection
