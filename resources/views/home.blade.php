@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!--div class="panel-heading">Dashboard</div>-->

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 col-sm-12" >
                            <h3 class='text-center' style="font-weight:bold">Olá {{ Auth::user()->name}} ! O que gostaria de fazer?</h3>
                            <hr>
                            <div class="col-md-12 text-center">
                                <p>Bem vindo ao nosso sistema de gerenciamento de Usuário do Web Service.</p>
                                <p>As principais funcionalidade dele é poder cadastrar um Usuário, edita-lo e Gerar o token de acesso.</p>
                                <p>Sendo assim, nós permite um controle de expiração do token e de usuários.</p>
                            </div>
                        </div>
        
                        <div class="col-md-12 col-sm-12 col-12" id='linhaAcoes' style="text-align:center">
                            <h5 style='font-weight:bold'>Algumas Ações</h5>

                            <div class="col-12" style="margin:10px">
                                <a href="{{ route('usuarios.adicionar') }}"><img src="{!! asset('imagem/addIcon.png') !!}" width=15> <span>Adicionar um novo Usuário</span></a></br>
                            </div>

                            <div class="col-12" style="margin:10px">
                                <a href="{{route('usuarios.index')}}"><img src="{!! asset('imagem/editIcon.png') !!}" width=15> <span>Editar um Usuário</span></a></br>
                            </div>

                            <div class="col-12" style="margin:10px">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <img src="{!! asset('imagem/sairIcon.png') !!}" width=15> <span>Sair</span></a></br>
                            </div>
                        </div>
                        <!--<div class="col-md-6 col-sm-12 col-12">
                            <h5 style='font-weight:bold'>Mais Ações</h5>

                            <div class="col-12" style="margin:10px">
                                <a href="{{ route('usuarios.adicionar') }}"><img src="{!! asset('imagem/addIcon.png') !!}" width=15> <span>asdsadsadsavo Usuário</span></a></br>
                            </div>

                            <div class="col-12" style="margin:10px">
                                <a href="#"><img src="{!! asset('imagem/editIcon.png') !!}" width=15> <span>sadsadsad</span></a></br>
                            </div>

                            <div class="col-12" style="margin:10px">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <img src="{!! asset('imagem/sairIcon.png') !!}" width=15> <span>Sair</span></a></br>
                            </div>
                        </div>-->
                        
                    </div>

                </div>                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-md-offset-2 text-center">
            <div class="panel panel-default" style="border-radius: 30px;">
                <div class="panel-heading" style="font-weight:bold;border-radius: 42px 40px 0px 0px;" >Usuarios Cadastrado</div>

                <div class="panel-body">
                    

                    <div class="row">
                        <div class="col-md-12">
                            <img src="{!! asset('imagem/userIcon.png') !!}" style='width:20px;'> <span>Usuarios Ativos = {{$usuarios}}</span>
                        </div>

                        
                    </div>

                </div>

                
            </div>
        </div>

        

        <div class="col-md-3 text-center">
            <div class="panel panel-default"  style="border-radius: 30px;">
                <div class="panel-heading" style="font-weight:bold;border-radius: 42px 40px 0px 0px;">Chaves Ativas</div>

                <div class="panel-body"  style="border-radius: 30px;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <img src="{!! asset('imagem/keyIcon.png') !!}" width=22> <span>Chaves Ativas = {{$chaves}}</span>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

        <div class="col-md-2 text-center">
            <div class="panel panel-default"  style="border-radius: 30px;">
                <div class="panel-heading" style="font-weight:bold;border-radius: 42px 40px 0px 0px;">Ultimo Acesso</div>

                <div class="panel-body"  style="border-radius: 30px;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">                            
                            <img src="{!! asset('imagem/dataIcon.png') !!}" width=22> <span>{{ $dataAtual}}</span>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>


    </div>
</div>
@endsection
