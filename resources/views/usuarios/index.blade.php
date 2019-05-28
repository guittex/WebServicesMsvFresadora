@extends('layouts.app')

@section('content')

<style>



</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <div class="row">
                        <div class="col-md-12 text-center">

                            <span class='title' id='titleUser' style="margin-bottom:50px;font-size:22px;font-weight:bold">Usuarios</span>
                            <a href="{{ route('usuarios.adicionar') }}" id='buttonTitle' class='btn btn-success' style="float:right">Adicionar Usuario</a>
                            <a href="{{ route('usuarios.adicionar') }}" style='float:right;'><img src="{!! asset('imagem/addIcon.png') !!}" id='addIcon' width=22 style="display:none;"></a>
                            <img src="{!! asset('imagem/pesquisarIcon.png') !!}" data-toggle="modal" data-target="#pesquisarModal" id='pesquisarIcon' width=22 style="display:none;">

                        </div>
                    </div>
                </div>

                <div class="panel-body table-responsive "> 

                        <div id="linhaPesquisa">
                            <div class="form-group row">
                                <form action="{{ route('usuarios.pesquisar') }}">
                                    <label for="inputPassword" class="col-sm-1 col-form-label"  style="margin-top:7px;">Usuario</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name='id' id="inputID" placeholder="Digite o ID do usuario">
                                    </div>

                                    <div class="col-sm-1">
                                        <button type='submit' class='btn btn-secondary'>Pesquisar</button>
                                    </div>

                                    <div class="col-sm-4">
                                        @if(!empty($_GET['id']))
                                        <a href="{{ route('usuarios.index') }}"><button type='button' class='btn btn-primary'>Listar todos</button></a>
                                        @endif
                                    </div>
                                </form>
                            </div>                              
                        </div>

                        <table class="table table-hover" style='margin-top:30px;'>
                            <thead>
                                <tr>
                                    @if(!empty($_GET['id']))     
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>

                                    @else                     

                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Token</th>
                                        <th scope="col">Expiração</th>     
                                        <th scope="col">Ação</th>

                                    @endif 

                                    
                                </tr>
                            </thead>

                            <tbody> 

                            @if(!empty($_GET['id']))
                            
                                <tr>                                   
                                    <td>{{$registros->id}}</td>
                                    <td>{{$registros->name}}</td>
                                    <td>{{$registros->email}}</td>                                    
                                </tr>
                            @else     

                                @foreach($registros as $usuarios)   
                                    
                                <?php
                                    $data = $usuarios->expiracao;
                                    $dataInt = strtotime($data);
                                    $dataConvertida = date('d-m-Y', $dataInt);

                                ?>    
                                
                                    <tr>
                                    
                                        <td>{{$usuarios->id}}</td>
                                        <td>{{$usuarios->name}}</td>
                                        <td>{{$usuarios->email}}</td>
                                        <td style='display:none'>{{$usuarios->password}}

                                        @if(!empty($usuarios->token))
                                            <td><img src="{!! asset('imagem/keyIcon.png') !!}"  data-toggle="modal" data-target="#tokenModal{{$usuarios->id}}" style="cursor:pointer"></td>
                                        
                                        
                                        <div class="modal fade" id="tokenModal{{$usuarios->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLongTitle">{{$usuarios->name}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="TOken">Token</label>
                                                        <textarea class="form-control rounded-0" style='width: 100%;height: 474px;' readonly>{{$usuarios->token}}</textarea>
                                                    </div>
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('deletar.token', $usuarios->id) }}"><button type="button" class="btn btn-danger">Deletar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <td>{{$dataConvertida}}</td>


                                        <td colspan=2>
                                            <a href="{{ route('usuarios.editar', $usuarios->id) }}"><img src="{!! asset('imagem/editarUserIcon.png') !!}" id='editarIcon' style="display:none;margin-bottom:10px"></a></br>
                                            <a href="{{ route('usuarios.editar', $usuarios->id) }}" id='editarButton' class='btn btn-primary'>Editar</a>
                                            <a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('usuarios.deletar', $usuarios->id)}}' : false)"><img src="{!! asset('imagem/deletarIcon.png') !!}" id='deletarIcon' style="display:none;"></a>
                                            <a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('usuarios.deletar', $usuarios->id)}}' : false)" id='deletarButton'  class='btn btn-danger'>Deletar</a>
                                        </td>
                                        
                                        @else

                                            <td style="cursor:not-allowed">Vazio</td>

                                            <td></td>


                                            <td colspan=2>
                                                <a href="{{ route('usuarios.editar', $usuarios->id) }}"> <img src="{!! asset('imagem/editarUserIcon.png') !!}" id='editarIcon' style="display:none;"></a></br>
                                                <a href="{{ route('gerarToken' , $usuarios->id) }}" id='keyButton' class='btn btn-success'>Gerar Token</a>
                                                <a href="{{ route('gerarToken' , $usuarios->id) }}"><img src="{!! asset('imagem/addKeyIcon.png') !!}" id='addKeyIcon' style="display:none;"></a>
                                                <a href="{{ route('usuarios.editar', $usuarios->id) }}" id='editarButton' class='btn btn-primary'>Editar</a><br id='quebraLinha' style="display:none">
                                                <a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('usuarios.deletar', $usuarios->id)}}' : false)"><img src="{!! asset('imagem/deletarIcon.png') !!}" id='deletarIcon' style="display:none;"></a>
                                                <a href="javascript:(confirm('Deletar esse registro?') ? window.location.href='{{route('usuarios.deletar', $usuarios->id)}}' : false)" id='deletarButton' class='btn btn-danger'>Deletar</a>
                                            </td>

                                        @endif     

        
                                    </tr>


                                @endforeach
                            @endif

                            </tbody>
                        </table>

                        @if(empty($_GET['id']))
                        <div align="center">
                        {!! $registros->links() !!}
                        </div> 
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>





@endsection
