<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Urbanizacion extends Model
{
    //
    protected $table = 'urbanizacion';

    protected $fillable = [
        'nombre',
        'descripcion'
        ];


    //public function getLastIdAttribute(){
        //$this->route->getParameter('urbanizaciones');
       // $ultimo= $this::model()->lastInsertId();
        //$ultimo=$ultimo+1;
        //dd($ultimo);
        //return $this->attributes['id'];
        //return $this->via . ' ' . $this->direccion . ' ' . $this->numero_puerta;
    //}

    public function setNombreAttribute($value){

        return $this->attributes['nombre'] = trim($value, $character_mask = " \t\n\r\0\x0B");
    }

    public function familias()
    {
        return $this->hasMany('inais\FamiliaBid');
    }
}
