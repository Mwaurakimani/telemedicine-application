<?php

namespace App\Http\Controllers;

use App\Http\Controllers\apiControllers\userApi;
use App\Models\conversation;
use App\Models\PatientReports;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PatientsController extends Controller
{
    use userApi;

    public function index()
    {
        $patients = User::where('account_type','Patient')->get();

        return Inertia::render('Dashboard/Patients/index',[
            'patients' =>$patients
        ]);
    }

    public function view(Request $request, User $User)
    {
        $reports = PatientReports::where('patient_id', $User->id)->get();

        return Inertia::render('Dashboard/Patients/view',[
            'patient' =>$User,
            'reports' => $reports
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Patients/patientForm');
    }

    public function update_patient(Request $request, $id){

        $patient = User::find($id);

        return Inertia::render('Dashboard/Patients/patientUpdate',[
            'patients' => $patient
        ]);
    }

    public function put_patient(Request $request , $id)
    {
        $patient = User::find($id);

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

        return redirect()->back();
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




    public function create_chat(Request $request, $id)
    {
        $patient = User::find($id);
        $doctor = Auth::user();

        $conversation = conversation::where('patient_id',$patient->id)->where('doctor_id', $doctor->id)->first();

        if($conversation){
            return $this->navigate_to_chat($conversation);
        }else{
            $conversation = new conversation();

            $conversation->patient_id = $patient->id;
            $conversation->doctor_id = $doctor->id;

            $conversation->save();

            return $this->navigate_to_chat($conversation);
        }

    }


    public function navigate_to_chat($conversation){
        $all_conversations = conversation::with('patients')->where('doctor_id', Auth::user()->id)->get();

        $conversation = conversation::with(['patients', 'messages'])->where('id', $conversation->id)->first();

        $notifications = new NotificationsController();

        return  $notifications->created_chat($conversation,$all_conversations);
    }
}
