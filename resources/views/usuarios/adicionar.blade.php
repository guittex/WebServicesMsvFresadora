
@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-md-8 col-md-offset-2">
        
                <div class="text-center">
                    <h2>Adicionar Usuario</h2>
                </div>
    
                <form action="{{ route('usuarios.salvar') }}" method="POST" >
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="Nome">Nome</label>
                        <input type="text" class="form-control" name='name' id="nomeInput" placeholder="Digite o nome do usuário">
                    </div>
                    <div class="form-group">
                        <label for="Descrição">Email</label>
                        <input type="text" class="form-control" name='email' id="emailInput" placeholder="Digite o E-mail do usuário">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" name='password' id="senhaInput" placeholder="Digite a senha">                            
                    </div>
                    <div class="form-group">
                        <label for="Avaliação">Confirme a senha</label>
                        <input type="password" class="form-control" name='confirm_password' id="avaliacaoInput" placeholder="Digite a senha novamente">                            
                    </div>
                    
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>

        </div>
</div>
@endsection