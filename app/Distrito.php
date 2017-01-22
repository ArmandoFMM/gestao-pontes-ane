<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $table = 'distritos';

    protected $fillable = [
        'nome_distrito',
        'provincia_id'
    ];

    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }
    
    public function pontes()
    {
        return $this->hasMany('App\Ponte');
    }

}
