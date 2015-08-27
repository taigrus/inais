<?php

namespace inais;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FamiliaBid extends Model
{
    //
    protected $table = 'familia_bid';
    //Se declara protect a dates para poder utilizar en este campo directamente carbon
    protected $dates = ['fecha_encuesta_lb'];

    protected $fillable = [
        'folio',
        'facilitador_id',
        'distrito_id',
        'urbanizacion_id',
        'nombre_jefe_hogar',
        'telefono',
        'via_id',
        'direccion',
        'numero_puerta',
        'otras_referencias',
        'fecha_encuesta_lb',
        'alcantarillado_id',
        'latitud',
        'longitud',
        'altura'];

    public function getDireccionCompletaAttribute($id){
        return $this->via->nombre . ' ' . $this->direccion . ' #' . $this->numero_puerta . ' (' . $this->distrito->nombre . '/Zona: ' . $this->urbanizacion->nombre . ') '  ;
        //return $this->via . ' ' . $this->direccion . ' ' . $this->numero_puerta;
    }

    public function getFechaEncuestaLbAttribute($value){
        //convierte la fecha a formato dia, mes y año para poder mostrarce en el datepicker
        return Carbon::parse($value)->format('d/m/Y');
    }


    public function setFechaEncuestaLbAttribute($value){
        //convierte la fecha a formato aceptado por la BD al momento de guardar
        if (!empty($value)){
            $this->attributes['fecha_encuesta_lb'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
        }else
        {
            $this->attributes['fecha_encuesta_lb'] = null;
        }
    }

    public function setDireccionAttribute($value){
        return $this->attributes['direccion'] = strtoupper(trim($value, $character_mask = " \t\n\r\0\x0B"));
    }

    public function setOtrasReferenciasAttribute($value){
        return $this->attributes['otras_referencias'] = strtoupper(trim($value, $character_mask = " \t\n\r\0\x0B"));
    }

    public function setNombreJefeHogarAttribute($value){
        return $this->attributes['nombre_jefe_hogar'] = strtoupper(trim($value, $character_mask = " \t\n\r\0\x0B"));
    }

    public function setTelefonoAttribute($value){
        //convierte la fecha a formato aceptado por la BD al momento de guardar
        if (empty($value)){
            $this->attributes['telefono'] = null;
        }
    }

    public function setLatitudAttribute($value){
        //convierte la fecha a formato aceptado por la BD al momento de guardar
        if (empty($value)){
            $this->attributes['latitud'] = null;
        }
    }
    public function setLongitudAttribute($value){
        //convierte la fecha a formato aceptado por la BD al momento de guardar
        if (empty($value)){
            $this->attributes['longitud'] = null;
        }
    }
    public function setAlturaAttribute($value){
        //convierte la fecha a formato aceptado por la BD al momento de guardar
        if (empty($value)){
            $this->attributes['altura'] = null;
        }
    }
    public function facilitador(){
        return $this->belongsTo('inais\Facilitador');
    }

    public function distrito(){
        return $this->belongsTo('inais\Distrito');
    }

    public function urbanizacion(){
        return $this->belongsTo('inais\Urbanizacion');
    }

    public function via(){
        return $this->belongsTo('inais\Via');
    }

    public function alcantarillado(){
        return $this->belongsTo('inais\Alcantarillado');
    }
}
