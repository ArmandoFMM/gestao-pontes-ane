<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    protected $table = 'problemas';

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    
}
