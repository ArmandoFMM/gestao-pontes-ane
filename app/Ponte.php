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
        'local_obstaculo',
        'imagem',
        'nome_obstaculo',
        'cadeia',
        'passeio',
        'tipo_material',
        'superficie_corrida',
        'juntas',
        'rolamento',
        'barreira',
        'comprimento_extensao',
        'nr_link',
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
