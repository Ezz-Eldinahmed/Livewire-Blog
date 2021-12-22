<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;

class UserControlller extends Controller
{
    public function profile(User $user)
    {
        return view('profile', ['user' => $user]);
    }
}
