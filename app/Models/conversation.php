<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversation extends Model
{
    use HasFactory;

    public function patients()
    {
        return $this->belongsTo(User::class,'patient_id','id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class,'doctor_id','id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class,'conversation_id','id');
    }
}
