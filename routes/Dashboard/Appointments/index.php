<?php


use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::post('/appointments/update/{id}',
    [AppointmentController::class, 'update']
)->name('update_appointment');


Route::get('/appointments/{id}',
    [AppointmentController::class, 'view']
)->name('view_appointments');


Route::get('/appointments',
    [AppointmentController::class, 'index']
)->name('list_appointments');

Route::post('/appointment/upload',
    [AppointmentController::class, 'upload_report']
)->name('upload_report');


Route::get('/appointment/download/{id}',
    [AppointmentController::class, 'download_report']
)->name('download_report');
