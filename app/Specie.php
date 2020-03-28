<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    public function specieManager()
    {
        return $this->hasMany('App\Manager', 'specie_id', 'id');
    }
     public function animalSpec()
    {
        return $this->hasMany('App\Animal', 'specie_id', 'id');
    }
}
