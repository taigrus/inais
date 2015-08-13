<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Urbanizacion extends Model
{
    //
    protected $table = 'urbanizacion';

    public function familias()
    {
        return $this->hasMany('inais\FamiliaBid');
    }
}
