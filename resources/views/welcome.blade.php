<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pone Kyi Mel</title>
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .container {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Pone Kyi Mel</h1>
                </div>
            </div>
            <div class="row">
                @if(isset($error))
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="/" class="text-center">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <input type="page_name" name="page" class="form-control" id="page_name" placeholder="Facebook Page Name">
                        </div>
                        <button type="submit" class="btn btn-default">Pone Kyi Mel</button>
                    </form>
                    <hr>
                </div>
            </div>

            <div class="row">
                @if(isset($images))
                    @foreach($images['data'] as $image)
                    <div class="col-md-10 col-md-offset-1">
                        <img src="{{ $image['images'][0]['source'] }}" alt="Pone Kyi Mel" class="img-responsive" style="width: 100%">
                    </div>
                    @endforeach
                    
                    <div class="col-md-12">
                        <ul class="pager">
                            @if(isset($images['paging']['previous']))
                                <li><a href="?page={{ $page }}&paging_before={{ $images['paging']['cursors']['before'] }}">Before</a></li>
                            @endif
                            @if(isset($images['paging']['next']))
                                <li><a href="/?page={{ $page }}&paging_after={{ $images['paging']['cursors']['after'] }}">Next</a></li>
                            @endif
                        </ul>
                    </div>

                @endif
            </div>
        </div>
    
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
