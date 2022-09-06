<?php

namespace App\Http\Controllers\apiControllers;

use App\Models\Appointment;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait appointmentApi
{
    public function searchDoctor(Request $request)
    {
        return User::where('name', 'like', '%' . $request['key'] . '%')->where('account_type','Doctor')->get();
    }

    public function patient_book_appointment(Request $request)
    {
        $datetime = new DateTime($request['appointment']['datetime']);
        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');

        $user = Auth::user();
        $appointment = new Appointment();

        $appointment->patient_id = $user->id;
        $appointment->doctor_id = $request['appointment']['doctor_id'];
        $appointment->appointment_dte = $date;
        $appointment->appointment_time = $time;
        $appointment->status = 'pending';

        $appointment->save();

        return $request;
    }

    public function fetch_appointment(Request $request)
    {
        $user = Auth::user();
        return $appointments = Appointment::with(['doctors','patient','more_info'])->where('patient_id',$user->id)->get();
    }

    public function fetch_latest_appointment(){
        $user = Auth::user();

        $appointments = Appointment::with(['doctors','patient'])->where('patient_id',$user->id)->get();

        $latest_item = $appointments->last();

        $ldate = date('Y-m-d');


        if(count($appointments) > 0){
            if( $appointments[0]->appointment_dte >= $ldate){
                return $appointments[0];
            }else{
                return  [];
            }
        }
    }
}
