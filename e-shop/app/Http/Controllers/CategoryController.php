<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Route Page Methods
    public function showListCategory()
    {
        return view("admin.page.category.list");
    }
    // End Page Route Methods

//----------------------------------------------------------

    // Route Webservices Methods
    public function getListCategory()
    {
        $list_category = Category::where("is_active", true)->get();
        return response(
            [
                "list_category" => $list_category,
                "result" => "success"
            ], 200
        );
    }
    // End Route Webservices Methods
}
