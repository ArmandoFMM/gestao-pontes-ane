<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDePonte extends Model
{
    protected $table = 'tipos';

    protected $fillable = [
        'designacao_tipo',
        'descricao_tipo'
    ];

    public function pontes()
    {
        return $this->hasMany('App\Ponte');
    }
}
