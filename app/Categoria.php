<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    /**
     * @return array
     */
    public function problemas()
    {
        return $this->hasMany('App\Problema');
    }
}
