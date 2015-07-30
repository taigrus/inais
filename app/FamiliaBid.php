<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class FamiliaBid extends Model
{
    //
    protected $table = 'familia_bid';

    protected $fillable = ['folio', 'direccion', 'latitud', 'longitud', 'altura'];

}
