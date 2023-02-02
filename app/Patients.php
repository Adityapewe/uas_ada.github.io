<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    protected $fillable = ['registration_code', 'name', 'birthdate', 'gender','polyclinic_id', 'doctor_id'];

    public function polyclinics() {
        return $this->belongsTo('App\Polyclinics', 'polyclinic_id', 'id');
    }

    public function doctors() {
        return $this->belongsTo('App\Doctors', 'doctor_id', 'id');
    }
}
