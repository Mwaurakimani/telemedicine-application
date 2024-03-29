<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;


    public function doctors(){
        return $this->belongsTo(User::class,'doctor_id','id');
    }

    public function patient(){
        return $this->belongsTo(User::class,'patient_id','id');
    }

    public function more_info(){
        return $this->hasOne(ApointmentLink::class,'appointment_id','id');
    }

    public function reports(){
        return $this->hasMany(PatientReports::class,'appointment_id','id');
    }
}
