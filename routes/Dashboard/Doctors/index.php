<?php


use App\Http\Controllers\DoctorsController;
use Illuminate\Support\Facades\Route;

Route::get('/doctors',
    [DoctorsController::class, 'index']
)->name('list_doctors');


Route::get('/doctors/view/{User}',
    [DoctorsController::class, 'view']
)->name('view_doctor_details');

Route::get('/doctors/create',
    [DoctorsController::class, 'create']
)->name('create_doctor');

Route::post('/doctors/create',
    [DoctorsController::class, 'store']
)->name('post_doctor');


Route::post('/doctors/update',
    [DoctorsController::class, 'put_doctor']
)->name('put_doctor');

Route::post('/doctors/updatePassword',
    [DoctorsController::class, 'update_password']
)->name('update_password');


