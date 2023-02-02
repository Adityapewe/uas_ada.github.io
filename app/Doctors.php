<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $fillable = ['registration_code', 'name', 'polyclinic_id'];

    public function polyclinics() {
        return $this->belongsTo('App\Polyclinics', 'polyclinic_id', 'id');
    }

    public function patiens() {
        return $this->hasMany('App\Patiens', 'doctor_id', 'id');
    }
}
