<?php

use Illuminate\Support\Facades\Route;



Route::post('/bookAppointment',[\App\Http\Controllers\AppointmentController::class,'patient_book_appointment'])->name('bookAppointment');
Route::get('/fetchAppointment/latest',[\App\Http\Controllers\AppointmentController::class,'fetch_latest_appointment']);
Route::post('/fetchAppointment',[\App\Http\Controllers\AppointmentController::class,'fetch_appointment']);



