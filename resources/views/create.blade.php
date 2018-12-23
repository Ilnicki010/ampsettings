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
            <fieldset>
                    <legend>Basic Settings</legend>
                <div class="form__elements__knobs">
                    <div class="form__elements__element form__elements__element--knob">
                        <label>Gain</label>
                        <input type="text" value="5" class="dial" data-min="0" data-max="10" name='gain' data-width=100 data-height=100 >
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
        </fieldset>
        </div>
        <fieldset>
            <legend>Pickup's</legend>
        <div class="form__pickups">
            <div class="pickups pickups--hss" id="pickupHSS">
                <label>H-S-S</label>
                <label class="pickup"></label>
                <label class="pickup"></label>
                <label class="pickup pickup--doubble" for="r3"></label>
                        
            </div>
            <div class="pickups pickups--hsh" id="pickupHSH">
                    <label>H-S-H</label>
                    <label class="pickup pickup--doubble" for="r4"></label>
                    <label class="pickup" for="r5"></label>
                    <label class="pickup pickup--doubble" for="r6"></label>
              
                </div>
            <div class="pickups pickups--sss" id="pickupSSS">
                        <label>S-S-S</label>
                        <label class="pickup" for="r9"></label>
                        <label class="pickup" for="r10"></label>
                        <label class="pickup" for="r11"></label>
                                
                </div>
        </div>
        <div class="form__pickups-controll">
            <div class="pickups-layout">
                <select name="pickupsLayout" id="pickupsLayout" for="pickupsLayout">
                        <option value="">Select pickups layout</option>
                        <option value="H-S-S">H-S-S</option>
                        <option value="H-S-H">H-S-H</option>
                        <option value="S-S-S">S-S-S</option>
                </select>
            </div>
         
            <div class="pickups__range">
                <input type="range" id="pickupNumber" name="pickupNumber" for="pickupNumber" min="1" max="5" step="1" value="1">
                <p>Position: <span id="pickupPositionText"></span></p>
            </div>
        </div>
    </fieldset>
        <div class="form__getAdvancedButton" id="getAdvanced">
            Advanced Settings <i class="fa fa-plus-circle"></i>
        </div>
        <div class="advanced__wrapped" id="advancedForm">
        <div class="form__advanced"> 
                <fieldset>
                        <legend>Advanced Settings</legend>
                    <div class="form__elements__knobs">
                        <div class="form__elements__element form__elements__element--knob">
                            <label>Delay</label>
                            <input type="text" value="0" class="dial" data-min="0" data-max="10" name='delay' data-width=80 data-height=80>
                        </div>
                        <div class="form__elements__element form__elements__element--knob">
                            <label>Distortion</label>
                            <input type="text" value="0" class="dial" data-min="0" data-max="10" name='distortion'data-width=80 data-height=80 >
                        </div>
                        <div class="form__elements__element form__elements__element--knob">
                            <label>Tremolo</label>
                            <input type="text" value="0" class="dial" data-min="0" data-max="10" name='tremolo'data-width=80 data-height=80 >
                        </div>
                        <div class="form__elements__element form__elements__element--knob">
                                <label>Phazer</label>
                                <input type="text" value="0" class="dial" data-min="0" data-max="10" name='phazer'data-width=80 data-height=80 >
                        </div>
                        <div class="form__elements__element form__elements__element--knob">
                            <label>Flanger</label>
                            <input type="text" value="0" class="dial" data-min="0" data-max="10" name='flanger'data-width=80 data-height=80 >
                        </div> 
                    </div>
            </fieldset>
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

