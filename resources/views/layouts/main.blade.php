<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>AMPSettings.com - Sounds cool</title>
    <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/animate.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
    @include('includes.message-block')
    <div class="container">
        <div class="container__header">
            <h1 class="container__header__text">@yield('header-text')</h1>
        </div>
        @yield('content')
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<script src="{{URL::to('js/app.js')}}"></script>
<script src="{{URL::to('js/knob.js')}}"></script>
<script>
        console.log('ddd');
        $(function() {
        $(".dial").knob({
          width:100,
          height:100
        });
    });
    </script>
</body>
</html>
