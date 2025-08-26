<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    /**
     * O nome da tabela associada ao model.
     * @var string
     */
    protected $table = 'produtos';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'url', 'preco_atual', 'preco_alvo', 'ultimo_check', 'ativo',
    ];
}