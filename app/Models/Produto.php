<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome_produto',
        'url_produto',
        'preco_alvo',
        'preco_atual',
        'contato_id',
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class);
    }
}