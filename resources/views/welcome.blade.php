<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pone Kyi Mel</title>

        <meta property="og:url"                content="https://www.ponekyimel.com/" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="See only images from Facebebook Page" />
        <meta property="og:description"        content="I just want to see images only from Facebebook Page, but how? Here we go!" />
        <meta property="og:image"              content="https://www.ponekyimel.com/img/cover.jpg" />

        <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
        <link rel="manifest" href="/img/manifest.json">
        <meta name="msapplication-TileColor" content="#622b2b">
        <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
        <meta name="theme-color" content="#622b2b">
        
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Fonts -->
        <link href="//fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            @import  url('https://mmwebfonts.comquas.com/fonts/?font=masterpiece');

            html, body {
                background-color: #f2efef;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .container {
                margin-top: 20px;
            }
            .mmfont {
                font-family:'Masterpiece Uni Sans',Yunghkio,Myanmar3;
                line-height: 1.5em;
            }
            button {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="/"><h1>Pone Kyi Mel</h1></a>
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
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="/" class="text-center">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <input type="search" name="page" class="form-control" id="page_name" placeholder="Facebook Page Name" required="true">
                        </div>
                        <button type="submit" class="btn btn-default">Let me see 😜</button>
                    </form>
                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <h5 class="mmfont text-center">
                        အသုံးပြုနည်း - Facebebook Page username ကို Page မှရယူပြီး input box မှာထည့်ပါ။ပြီးလျှင် Facebook Page Name ဆိုသော input box မှာထည့်ပြီး Let me see 😜 ဆိုတဲ့ button ကိုနှိပ်လိုက်ပါ။
                    </h5>
                </div>
            </div>
            
            @if(!isset($images))
            <div class="row text-center">
                <div class="col-md-12">
                    <hr>
                </div>
                <div class="col-md-3">
                    <form method="post" action="/" class="text-center">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                        <div class="form-group" style="display: none">
                            <input type="search" name="page" class="form-control" id="page_name" placeholder="Facebook Page Name" required="true" value="212390098842654">
                        </div>
                        <button type="submit" class="btn btn-primary">Let me see Lu Lu Aung's Photos 😜</button>
                    </form>
                    <br/>
                </div>
                <div class="col-md-3">
                    <form method="post" action="/" class="text-center">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                        <div class="form-group" style="display: none">
                            <input type="search" name="page" class="form-control" id="page_name" placeholder="Facebook Page Name" required="true" value="yrameos">
                        </div>
                        <button type="submit" class="btn btn-primary">Let me see Mary's Photos 😜</button>
                    </form>
                    <br/>
                </div>
                <div class="col-md-3">
                    <form method="post" action="/" class="text-center">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                        <div class="form-group" style="display: none">
                            <input type="search" name="page" class="form-control" id="page_name" placeholder="Facebook Page Name" required="true" value="saisaifanpage">
                        </div>
                        <button type="submit" class="btn btn-primary">Let me see Sai Sai's Photos 😜</button>
                    </form>
                    <br/>
                </div>
                <div class="col-md-3">
                    <form method="post" action="/" class="text-center">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
                        <div class="form-group" style="display: none">
                            <input type="search" name="page" class="form-control" id="page_name" placeholder="Facebook Page Name" required="true" value="147558671927485">
                        </div>
                        <button type="submit" class="btn btn-primary">Let me see Shwe Htoo's Photos 😜</button>
                    </form>
                    <br/>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
                @if(isset($images))
                    @foreach($images['data'] as $image)
                    <div class="col-md-5 col-md-offset-1">
                        <img src="{{ $image['images'][0]['source'] }}" alt="Pone Kyi Mel" class="img-responsive" style="width: 100%">
                        <br/>
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
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108627209-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-108627209-1');
        </script>

    </body>
</html>
