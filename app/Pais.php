<?php

namespace inais;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
        protected $table = 'pais';

        public function departamentos()
        {
            return $this->hasMany('inais\Departamento');
        }
}
