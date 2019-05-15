<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//ROTAS USUARIO


    Route::get('usuario', ['uses' => 'UserController@index', 'as' => 'usuarios.index']);
    Route::get('usuario/GerarToken/{id}', ['uses' => 'UserController@gerarToken', 'as' => 'gerarToken']);
    Route::get('usuario/DeletarToken/{id}' , ['uses' => 'UserController@deletarToken', 'as' => 'deletar.token']);
    Route::get('usuario/Adicionar', [ 'uses' => 'UserController@create', 'as' => 'usuarios.adicionar']);
    Route::post('usuario/Salvar', [ 'uses' => 'UserController@store', 'as' => 'usuarios.salvar']);
    Route::get('usuario/Deletar/{id}', ['uses' => 'UserController@destroy', 'as' => 'usuarios.deletar']);
    Route::get('usuario/Editar/{id}', ['uses' => 'UserController@edit', 'as' => 'usuarios.editar']);
    Route::post('usuario/Atualizar/{id}', [ 'uses' => 'UserController@update', 'as' => 'usuarios.atualizar']);
    Route::get('usuario/Pesquisar/', [ 'uses' => 'UserController@show', 'as' => 'usuarios.pesquisar']);

    Route::any('usuario/ultimoAcesso', ['uses' => 'UserController@ultimoAcesso', 'as' => 'ultimoAcesso']);





