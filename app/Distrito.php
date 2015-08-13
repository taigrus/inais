<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    //
    protected $table = 'distrito';

    public function familias()
    {
        return $this->hasMany('inais\FamiliaBid');
    }
}
