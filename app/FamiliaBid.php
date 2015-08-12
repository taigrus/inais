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

    public function getDireccionCompletaAttribute(){
        return $this->via . ' ' . $this->direccion . ' ' . $this->numero_puerta;
    }

    public function getFechaEncuestaLbAttribute($value){
        //convierte la fecha a formato dia, mes y año para poder mostrarce en el datepicker
        return Carbon::parse($value)->format('d/m/Y');
    }


    public function setFechaEncuestaLbAttribute($value){
        //convierte la fecha a formato aceptado por la BD al momento de guardar
        $this->attributes['fecha_encuesta_lb'] = Carbon::createFromFormat('d/m/Y', $value)->toDateString();
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
