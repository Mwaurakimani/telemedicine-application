<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/settings', function () {
    return Inertia::render('Dashboard/Settings/index');
})->name('open_settings');
