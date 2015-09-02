<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Poblacion extends Model
{
    //
    protected $table = 'poblacion';

    public function municipio(){
        return $this->belongsTo('inais\Municipio');
    }

    public function distritos()
    {
        return $this->hasMany('inais\Distrito');
    }
}
