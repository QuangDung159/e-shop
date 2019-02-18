<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private $ADMIN_CATEGORY_DIRECTORY = "admin.page.category.";

    private $ADMIN_CATEGORY_URL = "admin/category/";


    // Route Page Methods
    public function showListCategory()
    {
        return view($this->ADMIN_CATEGORY_DIRECTORY . "list");
    }

    public function showCreateCategoryPage()
    {
        return view($this->ADMIN_CATEGORY_DIRECTORY . "create");
    }

    public function postCreateCategory(Request $req)
    {
        $this->validate($req,
            [
                "category_name" => "required"
            ],
            [
                "category_name.required" => "Please provide Category Name"
            ]
        );

        $category = new Category();
        $category->id = str_random(11);
        $category->name = $req->category_name;
        $category->save();
        return redirect($this->ADMIN_CATEGORY_URL . "create")
            ->with("success", "Create Category successfully");
    }

    public function showUpdateCategoryPage($category_id)
    {
        $category = Category::find($category_id);
        if (isset($category)) {
            return view($this->ADMIN_CATEGORY_DIRECTORY . "update", [
                    "category" => $category
                ]
            );
        } else {
            return redirect($this->ADMIN_CATEGORY_URL . "list");
        }
    }

    public function postUpdateCategory($category_id, Request $req)
    {
        $this->validate($req,
            [
                "category_name" => "required"
            ],
            [
                "category_name.required" => "Please provide Category Name"
            ]
        );

        $category = Category::find($category_id);
        if (isset($category)) {
            $category->name = $req->category_name;
            $category->save();
            return redirect($this->ADMIN_CATEGORY_URL . "update/" . $category_id)
                ->with("success", "Update Category successfully");
        } else {
            return redirect($this->ADMIN_CATEGORY_URL . "list");
        }
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

    public function getDeleteCategory($category_id)
    {
        $category = Category::find($category_id);
        if (isset($category)) {
            $category->is_active = false;
            $category->save();
            return response([
                "result" => "success"
            ], 200);
        }
    }

    // End Route Webservices Methods
}
