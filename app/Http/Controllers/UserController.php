<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        //Protege a rota só para usuarios cadastrados
        //$this->middleware('auth:api');
        $this->middleware('auth');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pega todos usuarios da tabela users
        $registros = \App\User::all();

        
        //Retorna para o index passando os usuarios buscado
        //return response()->json(['data' => $registros]);
        return view('usuarios.index', compact('registros'));
    }

    public function getUsuario($id){

        //Encontra registro na tabela usuario pelo id
        $registro = \App\User::find($id);

        //Retorna ele
        return $registro;
    }

    
    public function gerarToken($id){
        //Define hora Padrão SP
        date_default_timezone_set('America/Sao_Paulo');

        //Procura User pelo ID
        $user = \App\User::find($id);

        //Gera o TOken do User com o nome dele
        $token = $user->createToken($user->name)->accessToken;

        //Pega a data
        $dataAtual = date('Y-m-d');
        
        //Acrescenta um ano a partir da data gerada
        $dataSoma = date('Y-m-d', strtotime('+365 days', strtotime($dataAtual)));

        //Verifica se o Token foi criado
        if($token){

            //Salva o token na tabela usuarioDB
            $tokenUser = DB::update("update dbo.users set token = '$token' where id = $id");

            //Salva a data de expiração na tabela Usuario
            $tokenUser = DB::update("update dbo.users set expiracao = '$dataSoma' where id = $id");

            //Mensagem de sucesso
            \Session::flash('flash_message',[
                'msg' => 'Token Gerado com sucesso',
                'class' => 'alert-success'
            ]);
    
            //Retorna para o index
            return redirect()->route('usuarios.index');

        }else{
            //Mensagem de erro
            \Session::flash('flash_message',[
                'msg' => 'Token não foi possivel gerar',
                'class' => 'alert-danger'
            ]);
    
            //Retorna para o index
            return redirect()->route('usuarios.index');
        }
        

    }

    public function deletarToken($id){
        
        //$IdClient = DB::select("select client_id from dbo.oauth_access_tokens where user_id = $id");    
        //$IdClient = (int)$IdClient[0]->client_id;
        
        //Deleta o token Criado
        $deleteToken = DB::delete("delete from dbo.oauth_access_tokens where user_id = $id");

        //$deleteClient = DB::delete("delete from dbo.oauth_clients where id = $IdClient");

        //Deleta o token da tabela Users
        $deleteTokenUser = DB::update("update dbo.users set token = null where id = $id");
        
        //Deleta o a data de expiracao da tabela Users
        $deleteTokenData = DB::update("update dbo.users set expiracao = null where id = $id");

        //Verifica se tudo foi deletado
        if($deleteToken and $deleteTokenUser){

            //Mensagem de Sucesso
            \Session::flash('flash_message',[
                'msg' => 'Deletado com sucesso',
                'class' => 'alert-success'
            ]);
    
            //Retorna para View
            return redirect()->route('usuarios.index');
        }else{

            //Mensagem de erro
            \Session::flash('flash_message',[
                'msg' => 'Deletado com sucesso',
                'class' => 'alert-success'
            ]);
    
            //Retorna para view
            return redirect()->route('usuarios.index');
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna para a view adicionar usuario
        return view('usuarios.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Verifica se os inputs da view adicionar
        $validatedData =  array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        );

        //Verifica se aas senhas são iguais
        if($request->password != $request->confirm_password){

            //Mensagem de erro
            \Session::flash('flash_message',[
                "msg" => "Senhas não são iguais",
                "class" => "alert-danger"
            ]);
            
            //Retorna para View
            return redirect()->route('usuarios.adicionar');
        }

        //Cria a validação
        $validator = Validator::make($request->all(), $validatedData);    

        //Verifica se a validação falhar        
        if ($validator->fails()){

            //Mensagem de erro
            \Session::flash('flash_message',[
                "msg" => "Existem campos vazio",
                "class" => "alert-danger"
            ]);

            //Retorna para view
            return redirect()->route('usuarios.adicionar');
        }else{

            //Criação do usuario
            \App\User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            //Mensagem de sucesso
            \Session::flash('flash_message',[
                "msg" => "Salvo com sucesso",
                "class" => "alert-success"
            ]);
            
            //Retorna para view
            return redirect()->route('usuarios.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request  $request)
    {
        //Pesquisa o registro pelo id digitado
        $registros = \App\User::find($request->id);

        //Se registro for null
        if($registros == null){
            //Retorna mensagem erro
            \Session::flash('flash_msg', [
                'msg' => 'Usuario não encontrado',
                'class' => 'alert-danger'
            ]);

            //Retorna para rota
            return redirect()->route('usuarios.index');
        }

        //dd($registros);
        //Retorna para view passando os registros
        return view('usuarios.index', compact('registros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Procura registro pelo ID
        $registro = \App\User::find($id);

        //Se registro esta vazio
        if(empty($registro)){
            //Retorna mensagem erro
            \Session::flash('flash_message', [
                'msg' => 'Nenhum registro encontrado',
                'class' => 'alert-danger'
            ]);
            //Retorna para view 
            return view("usuarios.index");
        }else{
            //Retorna para view passand registros
            return view("usuarios.editar", compact('registro'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Pega o usuario pelo ID
        $registro = UserController::getUsuario($id);
        
        //Se registro for vazio
        if(empty($registro)){
            //Mensagem de erro
            \Session::flash('flash_message', [
                'msg' => 'Nenhum registro encontrado',
                'class' => 'alert-danger'
            ]);
            //Retorna para rota
            return redirect()->route("usuarios.index");
        }else{
            //Atualiza o banco pela requisição
            \App\User::find($id)->update($request->all());

            //Retorna mensagem de sucesso
            \Session::flash('flash_message', [
                'msg' => 'Atualizado com sucesso',
                'class' => 'alert-success'
            ]);
            //Retorna para rota index
            return redirect()->route("usuarios.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Se tiver ID
        if($id){
            //Apaga o registro
            \App\User::destroy($id);

            //Mensagem de sucesso
            \Session::flash('flash_message', [
                'msg' => 'Usuario deletado com sucesso',
                'class' => 'alert-success'
            ]);
            
            //Retorna para rota index
            return redirect()->route('usuarios.index');

        }else{

            //Mensagem de erro
            \Session::flash('flash_message', [
                'msg' => 'Erro ao deletar usuario',
                'class' => 'alert-danger'
            ]);

            //Retorna para rota
            return redirect()->route('usuarios.index');

        }
    }

    public function ultimoAcesso(){
        date_default_timezone_set("America/Sao_Paulo");

        //Pega o id do usuario logado
        $id = Auth::user()->id;

        //Pega data atual
        $data = date('Y-m-d h:i:s');

        //Atualizo o banco pela ultima hora 
        DB::update("update dbo.users set ultimo_acesso = '$data' where id = $id");

        //Retorno hora
        return $data;
        

    }
}
