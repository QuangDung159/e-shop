<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    private $CLIENT_HOME_DIRECTORY = "client.page.home.";
    private $CLIENT_HOME_URL = "home";

    // Route Page Methods

    public function showHomePage()
    {
        return view($this->CLIENT_HOME_DIRECTORY . "home");
    }

// End Page Route Methods

//----------------------------------------------------------

// Route Webservices Methods

// End Route Webservices Methods
}
