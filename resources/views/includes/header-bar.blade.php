<nav class="header-bar" id="header-bar">
    <ul class="header_bar__list">
        <li class="header_bar__list__link"><a  href="{{route('home')}}"><img src="{{ asset('assets/logo_ig.png') }}" alt="" width="36px" height="36px"></a></li>
        <form action="{{route('home')}}" method="POST" class="header__search-form header_bar__search-form" autocomplete="off">
            <input type="text" placeholder="See how to play it..." class="header__search-form__input header_bar__search-form__input" name="search" id="findSong"/>
            <button type="submit" class="header__search-form__submit header_bar__search-form__submit"><i class="fas fa-search"></i></button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
        <li class="header_bar__list__link"><a id="addAmp"  href="{{route('create')}}">Add New</a></li>
        @if(Auth::user())
        <li class="header_bar__list__link" id="username"> <a class="user-name" href="{{route('user', ['user_nick' => Auth::user()->nick])}}">{{Auth::user()->nick}}</a></li>
        <li class="header_bar__list__link" id="logout"><a  href="{{route('logout')}}">Logout <i class="fas fa-sign-out-alt"></i></a></li>
        @else
        <li class="header_bar__list__link" id="login"><a  href="{{route('join')}}">Sign In <i class="fas fa-sign-in-alt"></i></a></li>
        @endif
    </ul>
</nav>