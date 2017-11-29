<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDefeito extends Model
{
    protected $table = 'tipo_defeitos';

    public function defeitos() {
        return $this->hasMany('App\DefeitoGrave');
    }
}
