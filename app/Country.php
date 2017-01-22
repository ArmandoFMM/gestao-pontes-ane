<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    protected $table = 'countries';

    protected $fillable = [
        'nome_country'
    ];

    public function provincias()
    {
        return $this->hasMany('App\Provincia');
    }
    
}
