<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    private $ADMIN_PRODUCT_DIRECTORY = "admin.page.product.";
    private $ADMIN_PRODUCT_URL = "admin/product/";

    public function showListProductPage()
    {
        $list_product = Product::where("is_active", true)->get();
        return view($this->ADMIN_PRODUCT_DIRECTORY . "list",
            [
                "list_product" => $list_product
            ]
        );
    }

    public function showCreateProductPage()
    {
        $list_sub_category = SubCategory::where("is_active", true)->get();
        $list_manu = Manufacturer::where("is_active", true)->get();
        return view($this->ADMIN_PRODUCT_DIRECTORY . "create",
            [
                "list_sub_category" => $list_sub_category,
                "list_manu" => $list_manu
            ]
        );
    }

    public function postCreateProduct(Request $request)
    {
        $this->validate($request,
            [
                "product_name" => "required|max:255|min:3",
                "product_price" => "required"
            ],
            [
                "product_name.required" => "Please provide Product Name",
                "product_name.max" => "Too long",
                "product_name.min" => "too short",

                "product_price.required" => "Please provide Product Price"
            ]
        );

        $product = new Product();
        $product->id = str_random(11);
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->description = "Xin lỗi! Không có thông tin về sản phẩm này.";
        $product->save();

        return redirect($this->ADMIN_PRODUCT_URL . "add_description/" . $product->id)
            ->with("success", "Create Product successfully");
    }

    public function showAddDescriptionPage($product_id)
    {
        return view($this->ADMIN_PRODUCT_DIRECTORY . "add_description",
            [
                "product_id" => $product_id
            ]
        );
    }

    public function postAddDescription($product_id, Request $request)
    {
        Log::info("postAddDescription");
        $product = Product::where("is_active", true)
            ->where("id", $product_id)->get()[0];
        if (isset($product)) {
            $product->description = $request->product_description;
            $product->save();
            return redirect($this->ADMIN_PRODUCT_URL . "list")
                ->with("success", "Add Product Description successfully");
        } else {
            return redirect($this->ADMIN_PRODUCT_URL . "list")
                ->with("error", "Product ID not exist");
        }
    }

    public function showUpdateProductPage($product_id)
    {
        $product = Product::where("is_active", true)
            ->where("id", $product_id)->get()[0];
        $list_sub_category = SubCategory::where("is_active", true)->get();
        $list_manu = Manufacturer::where("is_active", true)->get();
        if (isset($product)) {
            return view($this->ADMIN_PRODUCT_DIRECTORY . "update",
                [
                    "product" => $product,
                    "list_sub_category" => $list_sub_category,
                    "list_manu" => $list_manu
                ]
            );
        } else {
            return redirect($this->ADMIN_PRODUCT_URL . "list")
                ->with("error", "Product ID not exist");
        }
    }

    public function postUpdateProduct($product_id, Request $request)
    {
        $product = Product::where("id", $product_id)
            ->where("is_active", true)->get()[0];
        if (isset($product)) {
            $this->validate($request,
                [
                    "product_name" => "required|max:255|min:3",
                    "product_price" => "required"
                ],
                [
                    "product_name.required" => "Please provide Product Name",
                    "product_name.max" => "Too long",
                    "product_name.min" => "too short",

                    "product_price.required" => "Please provide Product Price"
                ]
            );

            $product->name = $request->product_name;
            $product->price = $request->product_price;
            $product->manufacturer_id = $request->manufacturer_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->save();

            return redirect($this->ADMIN_PRODUCT_URL . "update/" . $product_id)
                ->with("success", "Update Manufacturer successfully");
        } else {
            return redirect($this->ADMIN_PRODUCT_URL . "list")
                ->with("error", "Manufacturer ID not exist");
        }
    }

    public function getDeleteProduct($product_id)
    {
        $product = Product::find($product_id)
            ->where("is_active", true)->get()[0];
        if (isset($product)) {
            $product->is_active = false;
            $product->save();
            return redirect($this->ADMIN_PRODUCT_URL . "list")
                ->with("success", "Delete Product successfully");
        } else {
            return redirect($this->ADMIN_PRODUCT_URL . "list")
                ->with("error", "Product ID not exist");
        }
    }

    public function showUpdateDescription($product_id)
    {
        $product = Product::where("id", $product_id)
            ->where("is_active", true)->get()[0];
        return view($this->ADMIN_PRODUCT_DIRECTORY . "update_description",
            [
                "product" => $product
            ]
        );
    }

    public function postUpdateDescription($product_id, Request $request)
    {
        $product = Product::where("id", $product_id)
            ->where("is_active", true)->get()[0];
        if (isset($product)) {
            $product->description = $request->product_description;
            $product->save();
            return redirect($this->ADMIN_PRODUCT_URL . "update/" . $product_id)
                ->with("success", "Update Product Description successfully");
        } else {
            return redirect($this->ADMIN_PRODUCT_DIRECTORY . "list")
                ->with("error", "Product ID not exist");
        }
    }
}
