<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class FamiliaBid extends Model
{
    //
    protected $table = 'familia_bid';

    protected $fillable = ['folio', 'direccion', 'latitud', 'longitud', 'altura'];

    public function getDireccionCompletaAttribute(){
        return $this->via . ' ' . $this->direccion . ' ' . $this->numero_puerta;
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
