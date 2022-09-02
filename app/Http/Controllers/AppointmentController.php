<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AppointmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Appointments/index');
    }

    public function view()
    {
        return Inertia::render('Dashboard/Appointments/view');
    }
}
