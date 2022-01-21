<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'usuario'], function () use ($router) {
    $router->post('/cadastro', 'UsuarioController@cadastro');
    $router->get('/lista', 'UsuarioController@lista');
    $router->get('/{id}', 'UsuarioController@listaId');
});

$router->group(['prefix' => 'carteira'], function () use ($router) {
    $router->post('/transacao', 'CarteiraController@transacao');
    $router->get('/saldo/{idUsuario}', 'CarteiraController@saldo');
    $router->post('/deposito', 'CarteiraController@deposito');
    $router->get('/extratos/{idUsuario}', 'CarteiraController@extrato');
});


