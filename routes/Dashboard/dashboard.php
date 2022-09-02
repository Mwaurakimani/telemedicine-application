<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {


        //View
        Route::get('/dashboard',
            [DashboardController::class, 'index']
        )->name('dashboard');















        require_once "Appointments/index.php";
        require_once "Notifications/index.php";
        require_once "Patients/index.php";
        require_once "Doctors/index.php";
        require_once "Settings/index.php";

    });
