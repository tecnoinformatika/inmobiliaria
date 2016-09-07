<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $table = 'rol';

protected $fillable = ['nombre'];


public function user()
    {
        return $this->hasMany('App\Users','rol_id', 'id');
    }
}
