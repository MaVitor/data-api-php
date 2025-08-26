<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    /**
     * O nome da tabela associada ao model.
     * @var string
     */
    protected $table = 'contatos';
    
    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'telefone', 'ativo',
    ];
}