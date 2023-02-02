<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polyclinics extends Model
{
    protected $fillable = ['name'];

    public function doctors() {
        return $this->hasMany('App\Doctors', 'polyclinic_id', 'id');
    }

}
