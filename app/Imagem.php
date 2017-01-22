<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagems';

    protected $fillable = [
        'nome_imagem',
        'posicao',
        'ponte_id'
    ];

    public function ponte()
    {
        return $this->belongsTo('App\Ponte');
    }


}
