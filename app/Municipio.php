<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    protected $table = 'municipio';

    public function provincia(){
        return $this->belongsTo('inais\Provincia');
    }

    public function poblaciones()
    {
        return $this->hasMany('inais\Poblacion');
    }
}
