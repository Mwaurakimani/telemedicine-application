<?php

use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Route;

Route::get('/notifications',
    [NotificationsController::class, 'index']
)->name('open_notifications');
