<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ponte extends Model
{
    protected $table = 'pontes';

    use SoftDeletes;
    
        /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */
    protected $dates = ['deleted_at'];

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
        'visivel',
        'distrito_id',
        'estrada_id',
        'tipo_id'
    ];

    public function imagens() {
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

    public function inspecaos() {
        return $this->hasMany('App\Inspecao');
    }

    public function inspecoesPassadas() {

        return $this->hasMany('App\Inspecao')->where('publicada',true);
    }

    public function inspecoesAgendadas() {

        return $this->hasMany('App\Inspecao')->where('realizada',false);
    }

    public function estados() {

        return $this->hasMany('App\Estado')->withPivot('data');
    }

    public function currentEstado() {

        return $this->estados()[count($this->estados())-1];
    }

}
