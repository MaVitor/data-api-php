<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Retorna uma lista de todos os contatos.
     * Rota: GET /contatos
     */
    public function index()
    {
        return Contato::all();
    }

    /**
     * Cria um novo contato no banco de dados.
     * Rota: POST /contatos
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos
        $this->validate($request, [
            'nome' => 'required|string|max:100',
            'telefone' => 'required|string|max:20'
        ]);

        // Cria o contato
        $contato = Contato::create($request->all());

        // Retorna o contato criado com status 201
        return response()->json($contato, 201);
    }

    /**
     * Busca e exibe um contato específico.
     * Rota: GET /contatos/{id}
     */
    public function show($id)
    {
        $contato = Contato::findOrFail($id);
        return response()->json($contato);
    }

    /**
     * Atualiza um contato existente.
     * Rota: PUT /contatos/{id}
     */
    public function update(Request $request, $id)
    {
        $contato = Contato::findOrFail($id);

        // Valida os dados da requisição
        $this->validate($request, [
            'nome' => 'string|max:100',
            'telefone' => 'string|max:20',
            'ativo' => 'boolean'
        ]);

        $contato->update($request->all());

        return response()->json($contato);
    }

    /**
     * Remove um contato do banco de dados.
     * Rota: DELETE /contatos/{id}
     */
    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();

        return response('', 204);
    }
}