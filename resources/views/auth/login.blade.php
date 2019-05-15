@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

                <div class="panel-heading text-center" style="margin-bottom:10px">
                    <h2>Faça o Login</h2>
                </div>

                <div class="col-12 text-center">
                    <img src="{!! asset('imagem/avatar.png') !!}" width=100 style="margin-bottom:40px">
                </div>

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-md-offset-2">
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" style="border: none;border-bottom: 1px solid gray;" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-8 col-md-offset-2">
                                <input id="password" type="password" class="form-control" placeholder="Senha" style="border: none;border-bottom: 1px solid gray;"  name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary" style="width:25%">
                                    Login
                                </button>

                                <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>-->
                            </div>
                        </div>
                    </form>
                
        </div>
    </div>
</div>
@endsection
