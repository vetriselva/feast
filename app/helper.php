<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

if(! function_exists('User')) {
    function User() {
        return Auth::user();
    }
}

if(! function_exists('Role')) {
    function Role() {
        $user_id = Auth::user()->id;
        $user = User::with('role')->find($user_id);
        return $user->role;
    }
}