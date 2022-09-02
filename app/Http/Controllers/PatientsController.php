<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = User::where('account_type','Patient')->get();

        return Inertia::render('Dashboard/Patients/index',[
            'patients' =>$patients
        ]);
    }

    public function view(Request $request, User $User)
    {
        return Inertia::render('Dashboard/Patients/view',[
            'patient' =>$User
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Patients/patientForm');
    }

    public function store(Request $request)
    {
        $patient = new User();

        $patient->name = $request['name'];
        $patient->email = $request['email'];
        $patient->phone = $request['phone'];
        $patient->address = $request['address'];
        $patient->date_of_birth = $request['date_of_birth'];
        $patient->gender = $request['gender'];
        $patient->account_type = 'Patient';
        $patient->password = bcrypt('password');
        $patient->notes = $request['bio'];



        $patient->save();

        if($patient->id && $request['file']){

            $feedback = $this->upload_file($patient->id,$request['file'],Storage::disk('PatientImages'));

            $patient->delete();
            dd($feedback);
            $patient->profile_photo_path = $feedback;

            $patient->save();
        }

        return redirect()->action([PatientsController::class, 'index']);
    }


    public function upload_file($id,$file,$directory)
    {
        $path = storage_path("app");

        $name = $this->generateRandomString(5);

        $file_path = $directory->put('/',$file);

        return $file_path;
    }

    public function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
