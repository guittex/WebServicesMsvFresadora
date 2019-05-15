
@extends('layouts.app')

@section('content')

<style>


</style>
<div class="container">
        <div class="col-md-8 col-md-offset-2">
        
                <div class="text-center">
                    <h2>Editar Usuário</h2>
                </div>
    
                <form action="{{ route('usuarios.atualizar', $registro->id) }}" method="POST" >
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="Nome">Nome</label>
                        <input type="text" class="form-control" value='{{ $registro->name }}' name='name' id="nomeInput" placeholder="Digite o nome do usuário">
                    </div>
                    
                    <div class="form-group">
                        <label for="Descrição">Email</label>
                        <input type="text" class="form-control" value='{{ $registro->email }}' name='email' id="emailInput" placeholder="Digite o E-mail do usuário">
                    </div>
                                        
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>

        </div>
</div>
@endsection