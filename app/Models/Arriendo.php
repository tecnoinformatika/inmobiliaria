<?php
/**
 * Created by PhpStorm.
 * User: ing.Diegox
 * Date: 21/04/2016
 * Time: 4:13 PM
 */


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arriendo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'arriendo';

    public function arrendatario()
    {
        return $this->hasMany('App\Models\Arriendo', 'arrendatario_id', 'id');
    }
    public function codeudor()
    {
        return $this->hasMany('App\Models\Codeudor', 'codeud_id', 'id');
    }

}