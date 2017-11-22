<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspecao extends Model
{
    protected $table = 'inspecaos';

    protected $fillable = [
        'data',
        'tipo_inspecao_id',
        'user_id',
        'ponte_id'
    ];

    public function tipo_inspecao(){
        return $this->belongsTo('App\TipoInspecao');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function ponte(){
        return $this->belongsTo('App\Ponte');
    }

    public function getDataAttribute($value) {

        return date("d/m/y", strtotime($value));
    }
}
