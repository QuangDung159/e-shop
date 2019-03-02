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
                "prefix" => "slider"
            ],
            function () {
                $CONTROLLER_NAME = "SliderController@";
                Route::get("list", $CONTROLLER_NAME . "showListSliderPage");
                Route::get("create", $CONTROLLER_NAME . "showCreateSliderPage");
                Route::post("create", $CONTROLLER_NAME . "postCreateSlider");
                Route::get("update/{slider_id}", $CONTROLLER_NAME . "showUpdateSliderPage");
                Route::post("update/{slider_id}", $CONTROLLER_NAME . "postUpdateSlider");
                Route::get("delete/{slider_id}", $CONTROLLER_NAME . "getDeleteSlider");
            }
        );

        Route::group(
            [
                "prefix" => "image"
            ],
            function () {
                $CONTROLLER_NAME = "ImageController@";
                Route::get("list", $CONTROLLER_NAME . "showListImagePage");
                Route::get("create", $CONTROLLER_NAME . "showCreateImagePage");
                Route::post("create", $CONTROLLER_NAME . "postCreateImage");
                Route::get("update/{image_id}", $CONTROLLER_NAME . "showUpdateImagePage");
                Route::post("update/{image_id}", $CONTROLLER_NAME . "postUpdateImage");
                Route::get("delete/{image_id}", $CONTROLLER_NAME . "getDeleteImage");
            }
        );

        Route::group(
            [
                "prefix" => "gallery"
            ],
            function () {
                $CONTROLLER_NAME = "GalleryController@";
                Route::get("list", $CONTROLLER_NAME . "showListGalleryPage");
                Route::get("create", $CONTROLLER_NAME . "showCreateGalleryPage");
                Route::post("create", $CONTROLLER_NAME . "postCreateGallery");
                Route::get("update/{product_id}", $CONTROLLER_NAME . "showUpdateGalleryPage");
                Route::post("update/{gallery_id}", $CONTROLLER_NAME . "postUpdateGallery");
                Route::get("delete/{gallery_id}", $CONTROLLER_NAME . "getDeleteGallery");
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

        Route::group(
            [
                "prefix" => "gallery"
            ],
            function () {
                $CONTROLLER_NAME = "GalleryController@";
                Route::post("create", $CONTROLLER_NAME . "postCreateGallery");
            }
        );
    }
);
// End URL API