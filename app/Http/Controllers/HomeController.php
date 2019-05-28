<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set("America/Sao_Paulo");

        $id = Auth::user()->id;

        $registros = \App\User::all();
        
        $usuarios = count($registros);

        $registrosToken = DB::table('oauth_access_tokens')->get();

        $chaves = count($registrosToken);

        $dataAtual = \App\User::find($id);  
        //dd($dataAtual->ultimo_acesso);

        if($dataAtual->ultimo_acesso != null){
            $dataBd= $dataAtual->ultimo_acesso;
            
            $dataInt = strtotime($dataBd);
            
            $dataAtual = date('d-m-Y h:i:s', $dataInt);
        }else{
            $dataAtual = 'Primeiro acesso';
        }
        
        
        return view('home', compact('usuarios', 'chaves', 'dataAtual'));
    }
}
