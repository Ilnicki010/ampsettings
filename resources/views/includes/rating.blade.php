    <div class="stars">
    <form class="rating" action="{{route('rating.post')}}" id="addStar" method="POST">
            {{ csrf_field() }}
          <input type="text" value="{{$post->rating}}" id='ratingDial' class="dial rating__dial" data-step="0.5" data-min="0" data-max="5" name='gain' data-readOnly=true data-width=40 data-height=40 data-thickness=.2>
          <div class="stars__div">
            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
            <label class="star star-1" for="star-1"></label>
          </div>
          <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
      </div>
    <script>
            let token = '{{ Session::token() }}';
            let ratingUrl = '{{route('rating.post')}}';
            
        </script>