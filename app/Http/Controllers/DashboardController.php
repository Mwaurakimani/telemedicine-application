<?php /** @noinspection DuplicatedCode */

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use JetBrains\PhpStorm\ArrayShape;
use mysql_xdevapi\Table;

class DashboardController extends Controller
{
    public function index(): \Inertia\Response
    {
        $user = Auth::user();
        $appointment = null;

        if ($user->account_type == "Patient") {
            $appointment = Appointment::with(['doctors', 'patient'])->where('patient_id', $user->id)->get();
        }
        return Inertia::render('Dashboard',[
            'appointments'=>$appointment
        ]);
    }
}
