<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Urbanizacion extends Model
{
    //
    protected $table = 'urbanizacion';

    protected $fillable = [
        'nombre',
        'descripcion',
        'distrito_id'
        ];


    //public function getLastIdAttribute(){
        //$this->route->getParameter('urbanizaciones');
       // $ultimo= $this::model()->lastInsertId();
        //$ultimo=$ultimo+1;
        //dd($ultimo);
        //return $this->attributes['id'];
        //return $this->via . ' ' . $this->direccion . ' ' . $this->numero_puerta;
    //}

/*    public function setNombreAttribute($value){
        return $this->attributes['nombre'] = strtoupper(trim($value));
    }*/

    public function setDescripcionAttribute($value){
        return $this->attributes['descripcion'] = strtoupper(trim($value, $character_mask = " \t\n\r\0\x0B"));
    }

    public function distrito(){
        return $this->belongsTo('inais\Distrito');
    }

    public function familias()
    {
        return $this->hasMany('inais\FamiliaBid');
    }

}
