<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login',function (){
    return redirect('/');
})->name('login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {


        //View
        Route::get('/dashboard',
            [DashboardController::class, 'index']
        )->name('dashboard');


        Route::get('/accountPage',function (){
            return \Inertia\Inertia::render('Dashboard/Settings/account');
        })->name('account');















        require_once "Appointments/index.php";
        require_once "Notifications/index.php";
        require_once "Patients/index.php";
        require_once "Doctors/index.php";
        require_once "Settings/index.php";

    });


Route::post('updateUserDetails',function (\App\Http\Requests\userDetailsUpdate $request){
    $email = $request['email'];
    $phone = $request['phone'];

    $user = \App\Models\User::where('id',Auth::user()->id)->first();

    $user->email = $email;
    $user->phone = $phone;


    $user->save();

    return redirect()->back();

})->name('updateUserDetails');

Route::post('updateSecurityDetails',function (\App\Http\Requests\userSecurityUpdate $request){

    $password = $request['password'];

    $user = \App\Models\User::where('id',Auth::user()->id)->first();


    $user->password = bcrypt($password);

    $user->save();

    Auth::logout();
    return redirect('/login');

})->name('updateSecurityrDetails');
