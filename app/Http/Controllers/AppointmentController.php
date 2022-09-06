<?php

namespace App\Http\Controllers;

use App\Http\Controllers\apiControllers\appointmentApi;
use App\Models\ApointmentLink;
use App\Models\Appointment;
use App\Models\PatientReports;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    use appointmentApi;

    public function index()
    {
        $appointments = Appointment::with(['doctors', 'patient'])->get();

        return Inertia::render('Dashboard/Appointments/index', [
            'appointments' => $appointments,
        ]);
    }

    public function view(Request $request, $id)
    {
        $this->sync_info($id);
        $appointment = Appointment::with(['doctors', 'patient', 'more_info', 'reports'])->findOrFail($id);


        return Inertia::render('Dashboard/Appointments/view', [
            'appointment' => $appointment
        ]);
    }

    public function update(Request $request, Appointment $id)
    {
        $status = $request['status'];
        $appointment = $id;

        $appointment->status = $status;

        $info = $appointment->more_info()->first();

        $info->summary = $request->more_info['summary'];
        $info->prescription = $request->more_info['prescription'];

        $info->save();

        $info->appointment()->associate($appointment);

        $appointment->save();

        return redirect()->to('/appointments');
    }

    public function fetch_appointment_by_id(Request $request, $id)
    {
        $appointment = Appointment::with(['doctors', 'patient', 'more_info', 'reports'])->find($id);
        $doctor = User::where('id', $appointment->doctor_id)->get();
        return [
            'appointment' => $appointment,
            'doctor' => $doctor
        ];
    }

    public function sync_info($appointment)
    {
        $appointment_details = Appointment::find($appointment);

        if (count($appointment_details->more_info()->get()) < 1) {
            $info = new ApointmentLink();

            $info->appointment()->associate($appointment_details);

            $info->save();
        }
    }

    public function upload_report(Request $request)
    {
        $file = $request['file'];
        $appointment_id = $request['id'];


        if ($appointment_id && $request['file']) {
            $feedback = $this->upload_file($appointment_id, $request['file'], Storage::disk('Reports'));
            $appointment = Appointment::find($appointment_id);
            $patient = $appointment->patient()->get()[0];

            $db_file = new PatientReports();

            $db_file->patient_id = $patient->id;
            $db_file->appointment_id = $appointment->id;
            $db_file->file_path = $feedback;

            $db_file->save();
        }

        return redirect()->back();
    }

    public function upload_file($id, $file, $directory)
    {
        $path = storage_path("app");

        $name = $this->generateRandomString(5);

        $file_path = $directory->put('/', $file);

        return $file_path;
    }

    public function generateRandomString($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function download_report(Request $request, $id)
    {
        $file_id = $id;

        $db_file = PatientReports::find($file_id);

        $path = $db_file->file_path;

        return redirect()->to("/storage/Reports/".$path);
    }
}
