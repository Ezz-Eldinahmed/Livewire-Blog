<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserControlller extends Controller
{
    public function profile(User $user)
    {
        return view('profile', ['user' => $user->load(['profileImage', 'posts'])]);
    }
}
