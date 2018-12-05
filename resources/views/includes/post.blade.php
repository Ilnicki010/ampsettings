<div class="post" data-postid={{$post->id}}>
    <div class="post__header">

        <h1>{{$post->song_name}}</h1> by {{$post->artist->artist_name}}
        Added by 
        @if ($post->user_id === 0)
        <span>Stranger</span>
        @else
        
        @endif
        {{-- @if($post->user->verified)
            <i class="fas fa-check-circle"></i>
        @endif --}}

    <div class="post__rating">
        @include('includes.rating')
    </div>
    </div>
    <div class="post__elements">
        <div class="post__element">
            <label>Gain</label>
            <input type="text" value="{{$post->gain}}" class="dial" data-min="0" data-max="10" name='gain' data-readOnly=true data-width=70 data-height=70>
        </div>
        <div class="post__element">
            <label>Treble</label>
            <input type="text" value="{{$post->treble}}" class="dial" data-min="0" data-max="10" name='treble' data-readOnly=true data-width=70 data-height=70>
        </div>
        <div class="post__element">
            <label>Middle</label>
            <input type="text" value="{{$post->middle}}" class="dial" data-min="0" data-max="10" name='middle'data-readOnly=true data-width=70 data-height=70 >
        </div>
        <div class="post__element">
                <label>Bass</label>
                <input type="text" value="{{$post->bass}}" class="dial" data-min="0" data-max="10" name='bass' data-readOnly=true data-width=70 data-height=70>
            </div>
        </div>
    </div>