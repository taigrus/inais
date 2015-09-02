<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table = 'departamento';

    protected $fillable = [
        'nombre',
        'descripcion',
        'pais_id'];

    public function pais(){
        return $this->belongsTo('inais\Pais');
    }

    public function provincias()
    {
        return $this->hasMany('inais\Provincia');
    }
}
