<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum', 'apiCors'])->get('/logout', function (Request $request) {
    $user = Auth::user();

    return $user;

});


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware([
    'auth:sanctum',
    'apiCors',
])->group(function () {
    require 'API/appointmentAPI.php';
    require 'API/profile.php';
    require 'API/conversations.php';
});


//apis with no authorization

Route::middleware([
    'apiCors',
])->group(function () {
    Route::post('/searchDoctor', [\App\Http\Controllers\AppointmentController::class, 'searchDoctor']);
    Route::get('/appointment/{id}',[\App\Http\Controllers\AppointmentController::class,'fetch_appointment_by_id']);
    Route::get('/getDoctors',[\App\Http\Controllers\DoctorsController::class,'get_doctors']);
    Route::get('/getDoctors/{id}',[\App\Http\Controllers\DoctorsController::class,'get_doctor_by_id']);

});

