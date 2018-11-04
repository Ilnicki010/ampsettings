<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Laravel and jScroll - Infinite Scrolling</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="page-header">Comments</h1>
                @if (count($comments) > 0)
                    <div class="infinite-scroll">
                        @foreach($comments as $comment)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" width="64" height="64" src="/images/avatar.png" alt="">
                                    {{-- MAKE SURE THAT YOU PUT THE CORRECT IMG PATH FOR AVATARS --}}
                                </a>

                                <div class="media-body">
                                    <h4 class="media-heading">{{ $comment->song_name }}
                                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                                    </h4>
                                    {{ $comment->body }}
                                    <br>
                                    <span class="pull-right">
                                        <i id="like1" class="glyphicon glyphicon-thumbs-up" style="color: #1abc9c; cursor: pointer;"></i>
                                        {{ rand(0, 200) }}
                                        <i id="dislike1" class="glyphicon glyphicon-thumbs-down" style="color: #e74c3c; cursor: pointer;"></i>
                                        {{ rand(0, 50) }}
                                    </span>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        {{ $comments->links() }}
                    </div>
                @endif
            </div>

            <div class="col-md-12 text-center">
                <small><a href="http://laraget.com" class="text-muted">Filip Zdravkovic - Laraget.com</a></small>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    {{-- MAKE SURE THAT YOU PUT THE CORRECT PATH FOR jquery.jscroll.min.js --}}
    
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
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