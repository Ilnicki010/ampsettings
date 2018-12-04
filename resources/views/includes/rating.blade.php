<div class="stars">
  <form class="rating" action="{{route('rating.post')}}" id="addStar" method="POST">
          {{ csrf_field() }}
        <input type="text" value="{{$post->rating}}" id='ratingDial' class="dial rating__dial" data-step="0.5" data-min="0" data-max="5" name='gain' data-readOnly=true data-width=40 data-height=40 data-thickness=.2>
        <div class="stars__div">
          <label>
            <input type="radio" name="stars" value="1" class="stari"/>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="2" class="stari"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="3" class="stari"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
          </label>
          <label>
            <input type="radio" name="stars" value="4" class="stari"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="5" class="stari"/>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
      </form>
    </div>
  <script>
          let token = '{{ Session::token() }}';
          let ratingUrl = '{{route('rating.post')}}';
          
      </script>