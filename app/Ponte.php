<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponte extends Model
{
    protected $table = 'pontes';

    protected $fillable = [
        'nome_ponte',
        'ano_construcao',
        'lat_inicio',
        'lng_inicio',
        'lat_fim',
        'lng_fim',
        'tipo_obstaculo',
        'loc_obstaculo',
        'estado_ponte',
        'distrito_id',
        'estrada_id',
        'tipo_id'
    ];

    public function imagens()
    {
        return $this->hasMany('App\Imagem');
    }

    public function estrada()
    {
        return $this->belongsTo('App\Estrada');
    }

    public function distrito()
    {
        return $this->belongsTo('App\Distrito');
    }

    public function tipo()
    {
        return $this->belongsTo('App\TipoDePonte');
    }

}
