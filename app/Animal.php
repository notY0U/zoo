<?php

namespace App;
use App\Manager;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function species()
    {
        return $this->belongsTo('App\Specie', 'specie_id', 'id');
    }
    public function animalMan()
    {
        return $this->belongsTo('App\Manager', 'manager_id', 'id');
    }
}
