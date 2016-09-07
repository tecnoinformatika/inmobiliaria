<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arrendatario extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'arrendatario';

    public function arrendatario()
    {
        return $this->hasMany('App\Models\Arriendo', 'arrendatario_id', 'id');
    }

    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'persona_id', 'id');
    }

}