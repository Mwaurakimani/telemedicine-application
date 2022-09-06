<?php

use Illuminate\Support\Facades\Route;



Route::post('/conversations',[\App\Http\Controllers\ConversationController::class,'get_conversations']);


Route::post('/sendMessage',[\App\Http\Controllers\ConversationController::class,'send_message']);

Route::post('/receivemsg',[\App\Http\Controllers\ConversationController::class,'receive_msg']);



