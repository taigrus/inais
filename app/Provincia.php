<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    //
    protected $table = 'provincia';

    public function departamento(){
        return $this->belongsTo('inais\Departamento');
    }

    public function municipios()
    {
        return $this->hasMany('inais\Municipio');
    }
}
