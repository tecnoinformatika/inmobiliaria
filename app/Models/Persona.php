<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'persona';

    public function persona()
    {
        return $this->belongsTo('App\Models\Arrendatario', 'Arrendatario_id', 'id');
    }

}
