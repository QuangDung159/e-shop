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
            return view("admin.page.index", [
                "user_id" => $user_id
            ]);
        } else {
            return view("admin.page.index", [
                "user_id" => $user_id
            ]);
        }
    }
    // End Page Route Methods

//----------------------------------------------------------

    // Route Webservices Methods
    public function getDetailUser($user_id)
    {
        $user = User::find($user_id);
        return response([
            "user" => $user,
            "result" => "success"
        ], 200);
    }

    public function postUpdateUser($user_id, Request $req)
    {
        $this->validate($req,
            [
                "full_name" => "required|max:255|min:3",
                "phone" => "required|max:12|min:10",
                "dob" => "required",
                "email" => "required|max:255|min:3",
                "role_id" => "required"
            ],
            [
                "full_name.required" => "Please provide Full Name",
                "full_name.max" => "Too long",
                "full_name.min" => "Too short",

                "phone.required" => "Please provide Phone Number",
                "phone.max" => "Too long",
                "phone.min" => "Too short",

                "dob.required" => "Please provide D.O.B",

                "email.required" => "Please provide Email",
                "email.max" => "Too long",
                "email.min" => "Too short",
            ]
        );

        $user = User::find($user_id);
        $user->role_id = $req->role_id;
        $user->full_name = $req->full_name;
        $user->phone = $req->phone;
        $user->dob = $req->dob;
        $user->email = $req->email;

        $user->save();

        return response(
            [
                "user" => $user,
                "result" => "success"
            ], 200
        );
    }

    // End Route Webservices Methods
}
