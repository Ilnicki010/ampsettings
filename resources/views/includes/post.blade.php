            <div class="post" data-postid={{$post->id}}>
                <div class="post__basic">
                        <div class="post__header">
    
                                <h1>{{$post->song_name}}</h1> by {{$post->artist->artist_name}}
                                Added by 
                                @if ($post->user_id === 0)
                                <span>Stranger</span>
                                @else
                                <a href="{{route('user', ['user_nick' => $post->user->nick])}}">{{$post->user->nick}}</a>
                                @endif
                                {{-- @if($post->user->verified && isset($post->user))
                                    <i class="fas fa-check-circle"></i>
                                @endif --}}
                
                            <div class="post__rating">
                                @include('includes.rating')
                            </div>
                            </div>
                            <div class="post__elements post__elements--basic">
                                <div class="post__element post__element--basic">
                                    <label>Gain</label>
                                    <input type="text" value="{{$post->gain}}" class="dial" data-min="0" data-max="10" name='gain' data-readOnly=true data-width=70 data-height=70>
                                </div>
                                <div class="post__element post__element--basic">
                                    <label>Treble</label>
                                    <input type="text" value="{{$post->treble}}" class="dial" data-min="0" data-max="10" name='treble' data-readOnly=true data-width=70 data-height=70>
                                </div>
                                <div class="post__element post__element--basic">
                                    <label>Middle</label>
                                    <input type="text" value="{{$post->middle}}" class="dial" data-min="0" data-max="10" name='middle'data-readOnly=true data-width=70 data-height=70 >
                                </div>
                                <div class="post__element post__element--basic">
                                        <label>Bass</label>
                                        <input type="text" value="{{$post->bass}}" class="dial" data-min="0" data-max="10" name='bass' data-readOnly=true data-width=70 data-height=70>
                                    </div>
                                </div>
                                <div class="post__pickups">
                                        <center><h1 id="postPickupNumber">{{$post->pickups_layout}}</h1>
                                        <p>Position: <span id="postPickupPosition">{{$post->pickup_number}}</span></p></center>
                                        <div class="pickups pickups--hss" id="pickupHSS">
                                                <label class="pickup"></label>
                                                <label class="pickup"></label>
                                                <label class="pickup pickup--doubble" for="r3"></label>
                                                        
                                            </div>
                                            <div class="pickups pickups--hsh" id="pickupHSH">
                                                    <label class="pickup pickup--doubble" for="r4"></label>
                                                    <label class="pickup" for="r5"></label>
                                                    <label class="pickup pickup--doubble" for="r6"></label>
                                              
                                                </div>
                                            <div class="pickups pickups--sss" id="pickupSSS">
                                                        <label class="pickup" for="r9"></label>
                                                        <label class="pickup" for="r10"></label>
                                                        <label class="pickup" for="r11"></label>
                                                                
                                                </div>
                                </div>
                        </div>
                        <div class="post__advanced">
                            @if ($post->delay > 0 || $post->distortion > 0 || $post->tremolo > 0 || $post->phazer > 0 || $post->flanger > 0)
                            <div class="form__getAdvancedButton" id="getAdvanced">
                                Advanced <i class="fa fa-plus-circle"></i>
                            </div>
                            @endif
                                    <div id="advancedForm" class="advanced__wrapped"> 
                                        <div class="advanced__elements">
                                                <div class="post__element">
                                                    <label>Delay</label>
                                                    <input type="text" value="{{$post->delay}}" class="dial" data-min="0" data-max="10" name='delay' data-width=50 data-height=50 data-readOnly=true>
                                                </div>
                                                <div class="post__element">
                                                    <label>Distortion</label>
                                                    <input type="text" value="{{$post->distortion}}" class="dial" data-min="0" data-max="10" name='distortion'data-width=50 data-height=50 data-readOnly=true>
                                                </div>
                                                <div class="post__element">
                                                    <label>Tremolo</label>
                                                    <input type="text" value="{{$post->tremolo}}" class="dial" data-min="0" data-max="10" name='tremolo'data-width=50 data-height=50 data-readOnly=true>
                                                </div>
                                                <div class="post__element">
                                                        <label>Phazer</label>
                                                        <input type="text" value="{{$post->phazer}}" class="dial" data-min="0" data-max="10" name='phazer'data-width=50 data-height=50 data-readOnly=true >
                                                </div>
                                                <div class="post__element">
                                                    <label>Flanger</label>
                                                    <input type="text" value="{{$post->flanger}}" class="dial" data-min="0" data-max="10" name='flanger'data-width=50 data-height=50 data-readOnly=true>
                                                </div> 
                                        </div>
                                    </div>
                        </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
                <script src="{{URL::to('js/pickupPost.js')}}"></script>