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

$router->get('/health', function () {
    return response()->json(['status' => 'ok']);
});

$router->get('/health', function () {
    return response()->json(['status' => 'ok']);
});

$router->group(['prefix' => 'produtos'], function () use ($router) {
    // Rota para listar todos os produtos
    // GET /produtos
    $router->get('/', 'ProdutoController@index');

    // Rota para criar um novo produto
    // POST /produtos
    $router->post('/', 'ProdutoController@store');
});