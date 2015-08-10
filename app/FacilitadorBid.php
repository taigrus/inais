<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class FacilitadorBid extends Model
{
    //
    protected $table = 'facilitador_bid';

    public function getFullNameAttribute(){
        return $this->nombre . ' ' . $this->paterno . ' ' . $this->materno;
    }

    public function familias()
    {
        return $this->hasMany('inais\FamiliaBid');
    }


}
