<?php

namespace App\Http\Controllers\apiControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait userApi
{
    public function get_user(Request $request)
    {
        return Auth::user();
    }
}
