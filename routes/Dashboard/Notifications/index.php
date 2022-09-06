<?php

use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Route;

Route::get('/notifications',
    [NotificationsController::class, 'index']
)->name('open_notifications');


Route::get('/notifications/{id}',
    [NotificationsController::class, 'select_conversation']
)->name('select_conversation');



Route::post('/sendmsg',
    [NotificationsController::class, 'send_msg']
)->name('send_message');
