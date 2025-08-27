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

    /**
     * Busca e exibe um produto específico.
     * Rota: GET /produtos/{id}
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // O método findOrFail tenta encontrar o produto pelo ID
        // Se não encontrar, ele automaticamente lança uma exceção que o Lumen
        // converte em uma resposta HTTP 404 Not Found.
        $produto = Produto::findOrFail($id);

        // Se o produto for encontrado, retorna seus dados como JSON.
        return response()->json($produto);
    }

    /**
     * Atualiza um produto existente.
     * Rota: PUT /produtos/{id}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Encontra o produto ou retorna 404
        $produto = Produto::findOrFail($id);

        // Valida os dados da requisição. Usamos 'sometimes' para
        // permitir atualizações parciais (PATCH), mas como a rota é PUT,
        // o ideal é validar todos os campos que podem ser atualizados.
        $this->validate($request, [
            'nome' => 'string|max:255',
            'url' => 'url|max:500',
            'preco_alvo' => 'numeric',
            'ativo' => 'boolean'
        ]);

        // Atualiza o produto com os dados da requisição
        $produto->update($request->all());

        // Retorna o produto atualizado
        return response()->json($produto);
    }

    /**
     * Remove um produto do banco de dados.
     * Rota: DELETE /produtos/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encontra o produto ou retorna 404
        $produto = Produto::findOrFail($id);

        // Deleta o produto
        $produto->delete();

        // Retorna uma resposta de sucesso sem conteúdo (204 No Content)
        return response('', 204);
    }
}