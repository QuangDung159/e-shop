<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $ADMIN_SUB_CATEGORY_DIRECTORY = "admin.page.sub_category.";
    private $ADMIN_SUB_CATEGORY_URL = "admin/sub_category/";

    public function showListSubCategoryPage()
    {
        $list_sub_category = SubCategory::where("is_active", true)->get();
        return view($this->ADMIN_SUB_CATEGORY_DIRECTORY . "list",
            [
                "list_sub_category" => $list_sub_category
            ]
        );
    }

    public function showCreateSubCategoryPage()
    {
        $list_category = Category::all();
        return view($this->ADMIN_SUB_CATEGORY_DIRECTORY . "create",
            [
                "list_category" => $list_category
            ]
        );
    }

    public function postCreateSubCategory(Request $request)
    {
        $this->validate($request,
            [
                "sub_category_name" => "required|max:255|min:3"
            ],
            [
                "sub_category_name.required" => "Please provide Sub Category Name",
                "sub_category_name.min" => "Too short",
                "sub_category_name.max" => "Too long"
            ]
        );

        $sub_category = new SubCategory();
        $sub_category->id = str_random(11);
        $sub_category->name = $request->sub_category_name;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();

        return redirect($this->ADMIN_SUB_CATEGORY_URL . "create")
            ->with("success", "Create successfully");
    }

    public function showUpdateSubCategoryPage($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);
        if (!isset($sub_category)) {
            return redirect($this->ADMIN_SUB_CATEGORY_URL . "list")
                ->with("error", "Sub Category ID not exist");
        } else {
            $list_category = Category::all();
            return view($this->ADMIN_SUB_CATEGORY_DIRECTORY . "update",
                [
                    "sub_category" => $sub_category,
                    "list_category" => $list_category
                ]
            );
        }
    }

    public function postUpdateSubCategory($sub_category_id, Request $request)
    {
        $sub_category = SubCategory::find($sub_category_id);
        if (isset($sub_category)) {
            $this->validate($request,
                [
                    "sub_category_name" => "required|max:255|min:3"
                ],
                [
                    "sub_category_name.required" => "Please provide Sub Category Name",
                    "sub_category_name.min" => "Too short",
                    "sub_category_name.max" => "Too long"
                ]
            );

            $sub_category->name = $request->sub_category_name;
            $sub_category->category_id = $request->category_id;
            $sub_category->save();

            return redirect($this->ADMIN_SUB_CATEGORY_URL . "update/" . $sub_category_id)
                ->with("success", "Update Sub Category successfully");
        } else {
            return redirect($this->ADMIN_SUB_CATEGORY_URL . "list")
                ->with("error", "Sub Category ID not exist");
        }
    }

    public function getDeleteSubCategory($sub_category_id)
    {
        $sub_category = SubCategory::find($sub_category_id);
        if (isset($sub_category)) {
            $sub_category->is_active = false;
            $sub_category->save();
            return redirect($this->ADMIN_SUB_CATEGORY_URL . "list")
                ->with("success", "Delete Sub Category successfully");
        } else {
            return redirect($this->ADMIN_SUB_CATEGORY_URL . "list")
                ->with("error", "Sub Category ID not exist");
        }
    }
}
