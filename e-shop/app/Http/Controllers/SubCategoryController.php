<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $ADMIN_SUB_CATEGORY_DIRECTORY = "admin.page.sub_category.";

    public function showListSubCategoryPage()
    {
        $list_sub_category = SubCategory::where("is_active", true)->get();
        return view($this->ADMIN_SUB_CATEGORY_DIRECTORY . "list",
            [
                "list_sub_category" => $list_sub_category
            ]
        );
    }
}
