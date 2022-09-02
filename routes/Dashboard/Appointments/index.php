<?php


use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/appointments',
    [AppointmentController::class, 'index']
)->name('list_appointments');


Route::get('/appointments/1',
    [AppointmentController::class, 'view']
)->name('view_appointments');
