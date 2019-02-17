<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Route Page Methods

    // End Page Route Methods

//----------------------------------------------------------

    // Route Webservices Methods
    public function getListRole()
    {
        $list_role = Role::all();
        return response(
            [
                "list_role" => $list_role,
                "result" => "success"
            ], 200
        );
    }


    // End Route Webservices Methods
}
