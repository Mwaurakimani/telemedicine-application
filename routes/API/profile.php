<?php

use Illuminate\Support\Facades\Route;



Route::post('/profile',[\App\Http\Controllers\PatientsController::class,'get_user']);



