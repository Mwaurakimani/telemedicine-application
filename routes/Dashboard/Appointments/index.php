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

Route::get('/bookAppointment',function (){
    return \Inertia\Inertia::render('Dashboard/Appointments/CreateAppointment');
});


Route::post('/makeAppointment',[\App\Http\Controllers\AppointmentController::class,'patient_book_appointment'])->name('make_Appointment');
