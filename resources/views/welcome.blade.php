<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="imagem/png" href="{!! asset('imagem/titleIcon.png') !!}" />


        <title>Laravel</title>

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

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                font-weight:bold;

            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links > a:hover {
                color:black;    
                font-weight:bold;
                border: 1px solid #636b6f;
                border-radius: 50px;
                background-color:white;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            img {
                opacity: 2.0;
                filter: alpha(opacity=50); /* For IE8 and earlier */
            }

            @media (min-width: 1000px) 
            {
                body
                {
                    background-size: 100%;
                }
            }
        </style>
    </head>
    <body style='background-image: url("imagem/background_imagem.jpg");opacity:0.95;color:white;background-repeat: no-repeat;'>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                        <span  style="border-right:1px solid white!important;"></span>
                        <a href="{{ route('register') }}">Registrar</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bem Vindo
                </div>

                <!--<div class="links">
                    <a href="https://laravel.com/docs">Entrar</a>
                    <a href="https://laracasts.com">Registrar</a>
                    
                </div>-->
            </div>
        </div>
    </body>
</html>
