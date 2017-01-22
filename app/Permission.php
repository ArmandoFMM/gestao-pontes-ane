<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'designacao_permission',
        'descricao_permission'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}
