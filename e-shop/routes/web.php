<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// URL Routing Page
Route::group(
    [
        "prefix" => "admin"
    ],
    function () {
        Route::group(
            [
                "prefix" => ""
            ],
            function () {
                $CONTROLLER_NAME = "UserController@";
                Route::get("home/{user_id}", $CONTROLLER_NAME . "showDetailUserPage");
            }
        );
    }
);
// End URL Routing Page

//----------------------------------------------------------

// URL API
Route::group(
    [
        "prefix" => "api"
    ],
    function () {
        Route::group(
            [
                "prefix" => "user"
            ],
            function () {
                $CONTROLLER_NAME = "UserController@";
                Route::get("{user_id}", $CONTROLLER_NAME . "getDetailUser");
            }
        );
    }
);
// End URL API