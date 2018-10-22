@if(count($errors)>0)
        <div class="message-block message-block--error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
@endif
@if(Session::has('message'))
    <div class="message-block message-block--message">
        <ul>
          <li> {{Session::get('message')}}</li>
        <ul>
    </div>
    @endif