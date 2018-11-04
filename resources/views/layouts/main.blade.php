<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>AMPSettings.com - Sounds cool</title>
    <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/animate.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
    @include('includes.header-bar')
    @include('includes.message-block')
    @yield('header')
    <div class="container">
        <div class="container__header">
            <h1 class="container__header__text">@yield('header-text')</h1>
        </div>
        @yield('content')
    </div>
    @include('includes.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
<script src="{{URL::to('js/app.js')}}"></script>
<script src="{{URL::to('js/knob.js')}}"></script>
<script src="{{URL::to('js/scroll.js')}}"></script>
<script>
     $('ul.pagination').hide();
        $(function() {
        $(".dial").knob({
            width:100,
            height:100
        });
        $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
    });

    </script>
</body>
</html>
