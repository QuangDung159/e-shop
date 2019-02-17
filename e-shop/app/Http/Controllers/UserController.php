<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function showUserList()
    {
        Log::info("showUserList");
        return view("admin.page.user.list");
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

    public function getUserList()
    {
        Log::info("getUserList");
        $list_user = User::where("is_active", true)->get();

        return response(
            [
                "list_user" => $list_user,
                "result" => "success"
            ], 200);
    }

    public function getDeleteUser($user_id)
    {
        $user = User::find($user_id);
        $user->is_active = false;
        $user->save();
        return response([
            "user" => $user,
            "result" => "delete_success"
        ], 200);
    }

    public function postCreateUser(Request $req)
    {
        $this->validate($req,
            [
                "full_name" => "required|max:255|min:3",
                "username" => "required|max:255|min:3",
                "phone" => "required|max:12|min:10",
                "dob" => "required",
                "email" => "required|max:255|min:3",
                "role_id" => "required"
            ],
            [
                "full_name.required" => "Please provide Full Name",
                "full_name.max" => "Too long",
                "full_name.min" => "Too short",

                "username.required" => "Please provide Username",
                "username.max" => "Too long",
                "username.min" => "Too short",

                "phone.required" => "Please provide Phone Number",
                "phone.max" => "Too long",
                "phone.min" => "Too short",

                "dob.required" => "Please provide D.O.B",

                "email.required" => "Please provide Email",
                "email.max" => "Too long",
                "email.min" => "Too short",
            ]
        );

        $user = new User();
        $user->id = str_random(11);
        $user->password = bcrypt("123");
        $user->point = 0;
        $user->is_active = true;
        $user->role_id = $req->role_id;
        $user->full_name = $req->full_name;
        $user->phone = $req->phone;
        $user->dob = $req->dob;
        $user->email = $req->email;
        $user->username = $req->username;
        $user->save();

        return response(
            [
                "user" => $user,
                "result" => "Create success"
            ], 200
        );
    }

    // End Route Webservices Methods
}
