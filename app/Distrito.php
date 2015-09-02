<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    //
    protected $table = 'distrito';

    public function poblacion(){
        return $this->belongsTo('inais\Poblacion');
    }

    public function urbanizaciones()
    {
        return $this->hasMany('inais\Urbanizacion');
    }


}
