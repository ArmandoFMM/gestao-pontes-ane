<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrada extends Model
{
    protected $table = 'estradas';

    protected $fillable = [
        'nome_estrada'
    ];

    public function pontes()
    {
        return $this->hasMany('App\Ponte');
    }

}
