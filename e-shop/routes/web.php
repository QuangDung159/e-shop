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
                Route::get("user/detail/{user_id}", $CONTROLLER_NAME . "showDetailUserPage");
                Route::get("user/list", $CONTROLLER_NAME . "showUserList");
            }
        );

        Route::group(
            [
                "prefix" => "category"
            ],
            function () {
                $CONTROLLER_NAME = "CategoryController@";
                Route::get("list", $CONTROLLER_NAME . "showListCategory");
                Route::get("create", $CONTROLLER_NAME . "showCreateCategoryPage");
                Route::post("create", $CONTROLLER_NAME . "postCreateCategory");
                Route::get("update/{category_id}", $CONTROLLER_NAME . "showUpdateCategoryPage");
                Route::post("update/{category_id}", $CONTROLLER_NAME . "postUpdateCategory");
            }
        );

        Route::group(
            [
                "prefix" => "sub_category"
            ],
            function () {
                $CONTROLLER_NAME = "SubCategoryController@";
                Route::get("list", $CONTROLLER_NAME . "showListSubCategoryPage");
                Route::get("create", $CONTROLLER_NAME . "showCreateSubCategoryPage");
                Route::post("create", $CONTROLLER_NAME . "postCreateSubCategory");
                Route::get("update/{sub_category_id}", $CONTROLLER_NAME . "showUpdateSubCategoryPage");
                Route::post("update/{sub_category_id}", $CONTROLLER_NAME . "postUpdateSubCategory");
                Route::get("delete/{sub_category_id}", $CONTROLLER_NAME . "getDeleteSubCategory");
            }
        );

        Route::group(
            [
                "prefix" => "manufacturer"
            ],
            function () {
                $CONTROLLER_NAME = "ManufacturerController@";
                Route::get("list", $CONTROLLER_NAME . "showListManufacturerPage");
                Route::get("create", $CONTROLLER_NAME . "showCreateManufacturerPage");
                Route::post("create", $CONTROLLER_NAME . "postCreateManufacturer");
                Route::get("update/{manufacturer_id}", $CONTROLLER_NAME . "showUpdateManufacturerPage");
                Route::post("update/{manufacturer_id}", $CONTROLLER_NAME . "postUpdateManufacturer");
                Route::get("delete/{manufacturer_id}", $CONTROLLER_NAME . "getDeleteManufacturer");
            }
        );

        Route::group(
            [
                "prefix" => "product"
            ],
            function () {
                $CONTROLLER_NAME = "ProductController@";
                Route::get("list", $CONTROLLER_NAME . "showListProductPage");
                Route::get("create", $CONTROLLER_NAME . "showCreateProductPage");
                Route::get("add_description/{product_id}", $CONTROLLER_NAME . "showAddDescriptionPage");
                Route::post("add_description/{product_id}", $CONTROLLER_NAME . "postAddDescription");
                Route::get("update_description/{product_id}", $CONTROLLER_NAME . "showUpdateDescription");
                Route::post("update_description/{product_id}", $CONTROLLER_NAME . "postUpdateDescription");
                Route::post("create", $CONTROLLER_NAME . "postCreateProduct");
                Route::get("update/{product_id}", $CONTROLLER_NAME . "showUpdateProductPage");
                Route::post("update/{product_id}", $CONTROLLER_NAME . "postUpdateProduct");
                Route::get("delete/{product_id}", $CONTROLLER_NAME . "getDeleteProduct");
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
                Route::get("detail/{user_id}", $CONTROLLER_NAME . "getDetailUser");
                Route::post("detail/{user_id}", $CONTROLLER_NAME . "postUpdateUser");
                Route::get("list", $CONTROLLER_NAME . "getUserList");
                Route::get("delete/{user_id}", $CONTROLLER_NAME . "getDeleteUser");
                Route::post("create/", $CONTROLLER_NAME . "postCreateUser");
            }
        );

        Route::group(
            [
                "prefix" => "role"
            ],
            function () {
                $CONTROLLER_NAME = "RoleController@";
                Route::get("list", $CONTROLLER_NAME . "getListRole");
            }
        );

        Route::group(
            [
                "prefix" => "category"
            ],
            function () {
                $CONTROLLER_NAME = "CategoryController@";
                Route::get("list", $CONTROLLER_NAME . "getListCategory");
                Route::get("delete/{category_id}", $CONTROLLER_NAME . "getDeleteCategory");
            }
        );
    }
);
// End URL API