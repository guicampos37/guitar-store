<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'valor'];

    public function produto()
    {
        $this->belongsTo(Produto::class);
    }
}
