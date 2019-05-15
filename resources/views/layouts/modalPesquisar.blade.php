<div class="modal fade" id="pesquisarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="text-align:center">Pesquisar Usuario</h3>        
            </div>
            <div class="modal-body">
                <form action="{{ route('usuarios.pesquisar') }}" method="GET" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" class="form-control" name='id' id="nomeInput" placeholder="Digite o id do usuário">
                    </div>                              
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Procurar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>