<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Alcantarillado extends Model
{
    //
    protected $table = 'alcantarillado';

    public function familias()
    {
        return $this->hasMany('inais\FamiliaBid');
    }
}

