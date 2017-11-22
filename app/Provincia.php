<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'provincias';

    protected $fillable = [
        'nome_provincia',
        'country_id'
    ];

    public function distritos()
    {
        return $this->hasMany('App\Distrito');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
