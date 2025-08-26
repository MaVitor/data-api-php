<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Retorna uma lista de todos os produtos.
     * Rota: GET /produtos
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Cria um novo produto no banco de dados.
     * Rota: POST /produtos
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos na requisição
        $this->validate($request, [
            'nome' => 'required|string|max:255',
            'url' => 'required|url|max:500',
            'preco_alvo' => 'required|numeric'
        ]);

        // Cria o produto usando o Model
        $produto = Produto::create($request->all());

        // Retorna o produto criado com o status 201 (Created)
        return response()->json($produto, 201);
    }
}