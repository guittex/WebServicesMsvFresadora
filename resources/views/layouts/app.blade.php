<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="imagem/png" href="{!! asset('imagem/titleIcon.png') !!}" />

    

    <title>WebService</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>

#menuIcon {
    position: relative;
    margin-right: 15px;
    padding: 9px 10px;
    margin-bottom: 8px;
    background-color: transparent;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
   
}



.dropdown:hover .dropdown-content {
    display: block;
}

@media (max-width: 520px) 
{
    
    #menuLarge{
        display:none
    }

    #dropMenu{
        display:inherit!important
    }
}




</style>
<body style="background: #e3e5e6;">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top"style='background-color: #343a40'>
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    

                    @if(Auth::check())
                    
                    <div class="menu" id="menuLarge">
                        <a class="navbar-brand" href="{{ url('/home') }}"  style="color:white;letter-spacing: 2px;">
                            DashBoard
                        </a>

                        <a class="navbar-brand" href="{{ route('usuarios.index') }}"  style="color:white;letter-spacing: 2px;">
                            Usuarios
                        </a>

                        <a class="navbar-brand" href="http://192.168.1.214:8086/WebServiceMsv/public/api/testeJson/"  style="color:white;letter-spacing: 2px;">
                            Teste Api
                        </a>
                    </div>


            <div class="pos-f-t" id="dropMenu" style='display:none'>

                <img id="menuIcon" src="{!! asset('imagem/menuIcon.png') !!}" class="navbar-toggler" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Alterna navegação">
                <div class="collapse" id="navbarToggleExternalContent">
                    <HR>

                    <div class="p-4">
                        <a class="navbar-brand" href="{{ url('/home') }}"  style="color:white;letter-spacing: 2px;">
                            DashBoard
                        </a>

                        <a class="navbar-brand" href="{{ route('usuarios.index') }}"  style="color:white;letter-spacing: 2px;">
                            Usuarios
                        </a>

                        <a class="navbar-brand" href="http://192.168.1.214:8086/WebServiceMsv/public/api/testeJson/"  style="color:white;letter-spacing: 2px;">
                            Teste Api
                        </a>
                    </div>
                </div>
            </div>


                    @endif

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}"  style="color:white;">Entrar</a></li>
                            <li ><a href="{{ route('register') }}"  style="color:white">Registrar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="color:white" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a id='logout' style="color:black"  href="#"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Sair

                                            
                                        </a>

										<form id="logout-form" action="{{ route('logout') }}" id='logout' method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::has('flash_message'))
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div align='center' class="alert {{ Session::get('flash_message')['class'] }}">
                        {{ Session::get('flash_message')['msg'] }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        @yield('content')

        
        @extends('layouts.modalPesquisar')



    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
    
        $(document).ready(function(){
            $( "#logout" ).click(function() {
                $.ajax({
                    type: "GET",
                    url: "usuario/ultimoAcesso",
                    data: {},
                    beforeSend : function () {
                        console.log('Carregando Ultimo acesso...');
                    },
                    success : function(retorno){
                        //traz o retorno do que pegou do php 
                        console.log(retorno);                         
                    },                                                               
                    error:function(data){
                        console.log("error");
                    }
                });
            });


            
            
        });

        
    
    </script>
</body>
</html>
