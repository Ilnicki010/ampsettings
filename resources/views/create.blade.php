@extends('layouts.main')
@section('header-text')
    Add your AMPSetting's
@endsection
@section('content')
<form action="{{route('create')}}" method="POST">
    <div class="form">
        <div class="form__elements">
            <div class="form__elements__input">
                <div class="form__elements__input_element">
                    <label>Song Title</label>
                    <input type="text" placeholder="eg. R u mine?" name="song_name" id="song_name" class="form__elements__input_element__text" autocomplete="off">
                </div>
                <div class="form__elements__input_element">
                        <label>Artist</label>
                        <input type="text" placeholder="eg. Arctic Monkeys" name="artist" id="artist" class="form__elements__input_element__text" autocomplete="off">
                        <ul id="artistHints"></ul>
                </div>
            </div>
            <div class="form__elements__knobs">
                <div class="form__elements__element form__elements__element--knob">
                    <label>Gain</label>
                    <input type="text" value="5" class="dial" data-min="0" data-max="10" name='gain' data-width=100 data-height=100>
                </div>
                <div class="form__elements__element form__elements__element--knob">
                    <label>Treble</label>
                    <input type="text" value="5" class="dial" data-min="0" data-max="10" name='treble'data-width=100 data-height=100 >
                </div>
                <div class="form__elements__element form__elements__element--knob">
                    <label>Middle</label>
                    <input type="text" value="5" class="dial" data-min="0" data-max="10" name='middle'data-width=100 data-height=100 >
                </div>
                <div class="form__elements__element form__elements__element--knob">
                        <label>Bass</label>
                        <input type="text" value="5" class="dial" data-min="0" data-max="10" name='bass'data-width=100 data-height=100 >
                    </div>
                    
            </div>
        </div>
        <div class="form__controll">
            <button type="submit" class="form__controll__button">Share</button>
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </div>
</form>
@endsection
<script>
    let token = '{{ Session::token() }}';
    let searchUrl = '{{route('artistfind')}}';
    
</script>
