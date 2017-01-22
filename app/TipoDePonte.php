<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDePonte extends Model
{
    protected $table = 'tipo_de_pontes';

    protected $fillable = [
        'designacao_tipo_de_ponte',
        'descricao_tipo_de_ponte'
    ];

    public function pontes()
    {
        return $this->hasMany('App\Ponte');
    }
}
