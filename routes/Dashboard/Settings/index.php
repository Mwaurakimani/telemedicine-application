<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/settings', function () {
    $user = \Illuminate\Support\Facades\Auth::user();

    return Inertia::render('Dashboard/Settings/index',[
        'account' => $user
    ]);
})->name('open_settings');
