<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Route Page Methods

    // End Page Route Methods

//----------------------------------------------------------

    // Route Webservices Methods

    // End Route Webservices Methods

    public function __construct()
    {
        View::share("DIRECTORY_ADMIN_ASSET", "asset/admin/");

        View::share("SUBMIT_BUTTON", "Submit");
        View::share("EDIT_BUTTON", "Edit");
        View::share("CANCEL_BUTTON", "Cancel");
        View::share("CREATE_BUTTON", "Create");
        View::share("DELETE_BUTTON", "Delete");

        View::share("IMAGE_PATH", "image");
    }
}
