<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = ['designacao_estado'];

    public function pontes() {

        return $this->belongsToMany('App\Ponte')->withPivot('data')->where('visivel', true);
    }

}