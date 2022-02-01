<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'nome'];

    public function produto()
    {
        return $this->belongsToMany(Produto::class,
            'categoria_produto',
            'categoria_id',
            'produto_id'
        );
    }
}
