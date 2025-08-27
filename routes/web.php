<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/health', function () {
    return response()->json(['status' => 'ok']);
});

// Agrupando todas as rotas relacionadas a Produtos
$router->group(['prefix' => 'produtos'], function () use ($router) {
    // Rota para listar todos os produtos (GET /produtos)
    $router->get('/', 'ProdutoController@index');

    // Rota para criar um novo produto (POST /produtos)
    $router->post('/', 'ProdutoController@store');

    // Rota para buscar um produto por ID (GET /produtos/{id})
    $router->get('/{id}', 'ProdutoController@show');
    
    // Rota para atualizar um produto (PUT /produtos/{id})
    $router->put('/{id}', 'ProdutoController@update');

    // Rota para deletar um produto (DELETE /produtos/{id})
    $router->delete('/{id}', 'ProdutoController@destroy');
});

// Agrupando todas as rotas relacionadas a Contatos
$router->group(['prefix' => 'contatos'], function () use ($router) {
    // Rota para listar todos os contatos (GET /contatos)
    $router->get('/', 'ContatoController@index');

    // Rota para criar um novo contato (POST /contatos)
    $router->post('/', 'ContatoController@store');

    // Rota para buscar um contato por ID (GET /contatos/{id})
    $router->get('/{id}', 'ContatoController@show');

    // Rota para atualizar um contato (PUT /contatos/{id})
    $router->put('/{id}', 'ContatoController@update');

    // Rota para deletar um contato (DELETE /contatos/{id})
    $router->delete('/{id}', 'ContatoController@destroy');
});