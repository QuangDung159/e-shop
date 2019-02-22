<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        return view($this->ADMIN_MANUFACTURER_DIRECTORY . "create");
    }

    public function postCreateProduct(Request $request)
    {
        $this->validate($request,
            [
                "manufacturer_name" => "required|min:3|max:255"
            ],
            [
                "manufacturer.required" => "Please provide Manufacturer Name",
                "manufacturer.max" => "Too long",
                "manufacturer.min" => "too short"
            ]
        );

        $manufacturer = new Manufacturer();
        $manufacturer->name = $request->manufacturer_name;
        $manufacturer->id = str_random(11);
        $manufacturer->save();

        return redirect($this->ADMIN_MANUFACTURER_URL . "create")
            ->with("success", "Create Manufacturer successfully");
    }

    public function showUpdateProductPage($manufacturer_id)
    {
        $manu = Manufacturer::find($manufacturer_id)
            ->where("is_active", true)->get()[0];
        if (isset($manu)) {
            return view($this->ADMIN_MANUFACTURER_DIRECTORY . "update",
                [
                    "manu" => $manu
                ]
            );
        } else {
            return redirect($this->ADMIN_MANUFACTURER_URL . "list")
                ->with("error", "Manufacturer ID not exist");
        }
    }

    public function postUpdateProduct($manufacturer_id, Request $request)
    {
        $manu = Manufacturer::find($manufacturer_id)
            ->where("is_active", true)->get()[0];
        if (isset($manu)) {
            $this->validate($request,
                [
                    "manufacturer_name" => "required|min:3|max:255"
                ],
                [
                    "manufacturer.required" => "Please provide Manufacturer Name",
                    "manufacturer.max" => "Too long",
                    "manufacturer.min" => "too short"
                ]
            );

            $manu->name = $request->manufacturer_name;
            $manu->save();

            return redirect($this->ADMIN_MANUFACTURER_URL . "update/" . $manufacturer_id)
                ->with("success", "Update Manufacturer successfully");
        } else {
            return redirect($this->ADMIN_MANUFACTURER_URL . "list")
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
}
