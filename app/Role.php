<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';

    protected $fillable = [
        'nome_role',
        'descricao_role'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
}
