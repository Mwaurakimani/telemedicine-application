<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::get('/patients',
    [PatientsController::class, 'index']
)->name('list_patients');


Route::get('/patients/view/{User}',
    [PatientsController::class, 'view']
)->name('view_patient_details');

Route::get('/patients/create',
    [PatientsController::class, 'create']
)->name('edit_patient');

Route::post('/patients/create',
    [PatientsController::class, 'store']
)->name('post_patient');


Route::get('/patients/create/chat/{id}',
    [PatientsController::class, 'create_chat']
)->name('initiate_chat');

Route::get('/patients/edit/{id}',
    [PatientsController::class, 'update_patient']
)->name('update_patient');

Route::post('/patients/edit/{id}',
    [PatientsController::class, 'put_patient']
)->name('put_patient');
