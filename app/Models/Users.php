<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
protected $table = 'users';

protected $fillable = ['user', 'password', 'email', 'rol_id'];


public function rol()
    {
        return $this->belongsTo('App\Users','rol_id', 'id');
    }
}
