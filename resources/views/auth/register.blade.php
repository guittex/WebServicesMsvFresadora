@extends('layouts.app')

@section('content')


<div class="container" >

    <div class="row">
        <div class="col-md-8 col-sm-8 col-8 col-md-offset-2 col-sm-offset-2 col-offset-2"  style="margin-top:20px;">
        <div class="panel panel-default" style='background-image: url("imagem/teste.jpg");opacity:0.95;color:white;background-repeat: no-repeat;border-radius:37px;'>

            <!-- NOVOOOOOOOOOOOOOOOOOOOOOOO -->
                <div class="col-md-12 text-center" style="margin-bottom:30px">
                    <h2>Cadastrar</h2>
                </div>

                <hr style="border:0.3px solid;width:64%">
                
                

                <!--<div class="col-12 text-center">
                    <img src="{!! asset('imagem/avatar.png') !!}" width=100 style="margin-bottom:40px">
                </div>-->

                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-sm-8 col-8 col-md-offset-2 col-sm-offset-2 col-offset-2">
                                <input id="name" type="text" class="form-control input-register" name="name" value="{{ old('name') }}" placeholder='Digite seu nome' required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-sm-8 col-8 col-md-offset-2 col-sm-offset-2 col-offset-2">
                                <input id="email" type="email" class="form-control input-register" name="email" placeholder='Digite seu e-mail' value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-sm-8 col-8 col-md-offset-2 col-sm-offset-2 col-offset-2">
                                <input id="password" type="password" class="form-control input-register" placeholder='Digite sua senha' name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-8 col-sm-8 col-8 col-md-offset-2 col-sm-offset-2 col-offset-2">
                                <input id="password-confirm" type="password" class="form-control input-register" placeholder='Confirme sua senha' name="password_confirmation" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-12 text-center">
                                <button type="submit" class="btn btn-success" style="width:25%;margin-bottom:20px">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
