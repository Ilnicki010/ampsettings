<nav class="header-bar">
    <ul class="header_bar__list">
        <li class="header_bar__list__link"><a  href="{{route('home')}}"><i class="fas fa-home"></i></a></li>
        <form action="{{route('home')}}" method="POST" class="header__search-form header_bar__search-form">
            <input type="text" placeholder="Enter song name, artist or user nick" class="header__search-form__input header_bar__search-form__input" name="search"/>
            <button type="submit" class="header__search-form__submit header_bar__search-form__submit"><i class="fas fa-search"></i></button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
        <li class="header_bar__list__link"><a  href="{{route('create')}}">Add AMPSetting's</a></li>
        @if(Auth::user())
        <li class="header_bar__list__link"> <a class="user-name" href="{{route('user', ['user_nick' => Auth::user()->nick])}}">{{Auth::user()->nick}}</a></li>
        <li class="header_bar__list__link"><a  href="{{route('logout')}}">Logout <i class="fas fa-sign-out-alt"></i></a></li>
        @else
        <li class="header_bar__list__link"><a  href="{{route('join')}}">Sign In <i class="fas fa-sign-in-alt"></i></a></li>
        @endif
    </ul>
</nav>