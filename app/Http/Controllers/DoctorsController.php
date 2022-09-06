<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use PhpParser\Comment\Doc;

class DoctorsController extends Controller
{
    public function index()
    {
        $doctors = User::where('account_type','Doctor')->get();

        return Inertia::render('Dashboard/Doctors/index',[
            'Doctors' => $doctors
        ]);
    }

    public function view(Request $request, User $User)
    {
        $doctor = $User;

        return Inertia::render('Dashboard/Doctors/doctorView',[
            'doctor' => $doctor
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Doctors/doctorForm');
    }

    public function store(Request $request){

        $doctor = new User();

        $doctor->name = $request['name'];
        $doctor->email = $request['email'];
        $doctor->phone = $request['phone'];
        $doctor->address = $request['address'];
        $doctor->practice = $request['practice'];
        $doctor->date_of_birth = $request['date_of_birth'];
        $doctor->gender = $request['gender'];
        $doctor->account_type = 'Doctor';
        $doctor->password = bcrypt('password');
        $doctor->notes = $request['bio'];

        $doctor->save();

        if($doctor->id && $request['file']){
            $feedback = $this->upload_file($doctor->id,$request['file'],Storage::disk('DoctorImages'));

            $doctor->profile_photo_path = $feedback;

            $doctor->save();
        }

        return redirect()->action([DoctorsController::class, 'index']);
    }


    public function put_doctor(Request $request)
    {
        $doctor = Auth::user();

        $doctor->name = $request['name'];
        $doctor->email = $request['email'];
        $doctor->phone = $request['phone'];
        $doctor->address = $request['address'];
        $doctor->practice = $request['practice'];
        $doctor->date_of_birth = $request['date_of_birth'];
        $doctor->gender = $request['gender'];
        $doctor->account_type = 'Doctor';
        $doctor->password = bcrypt('password');
        $doctor->notes = $request['bio'];

        $doctor->save();


        return redirect()->back();

    }


    public function update_password(Request $request)
    {
        $user = Auth::user();

        return $user;
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


    //api

    public function get_doctors()
    {
        return User::where('account_type','Doctor')->get();
    }

    public function get_doctor_by_id(Request $request, $id)
    {
        return User::where('id',$id)->get()[0];
    }
}
