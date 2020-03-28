<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function animalManage()
    {
        return $this->hasMany('App\Animal', 'manager_id',  'id');
    }
    public function manageSpecie()
    {
        return $this->belongsTo('App\Specie', 'specie_id',  'id');
    }
}
