<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Via extends Model
{
    //
    protected $table = 'via';

    public function familias()
    {
        return $this->hasMany('inais\FamiliaBid');
    }
}
