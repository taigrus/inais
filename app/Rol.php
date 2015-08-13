<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion', 'permisos'];

    public function users()
    {
        return $this->hasMany('inais\User');
    }

}
