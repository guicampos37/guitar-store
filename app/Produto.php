<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome', 'valor', 'imagem'];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,
            'categoria_produto', 
            'produto_id',
            'categoria_id'
        );
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
