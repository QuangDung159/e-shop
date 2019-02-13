<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Route Page Methods
    public function showDetailUserPage($user_id)
    {
        $user = User::find($user_id);
        if ($user->role_id == 1) {
            return view("");
        } else {
            return view("");
        }
    }
    // End Page Route Methods

//----------------------------------------------------------

    // Route Webservices Methods

    // End Route Webservices Methods
}
