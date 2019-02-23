<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $ADMIN_SLIDER_DIRECTORY = "admin.page.slider.";
    private $ADMIN_SLIDER_URL = "admin/slider/";

    public function showListSliderPage()
    {
        $list_slider = Slider::where("is_active", true)->get();
        return view($this->ADMIN_SLIDER_DIRECTORY . "list",
            [
                "list_slider" => $list_slider
            ]
        );
    }

    public function showCreateSliderPage()
    {
        return view($this->ADMIN_SLIDER_DIRECTORY . "create");
    }

    public function postCreateManufacturer(Request $request)
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

    public function showUpdateManufacturerPage($manufacturer_id)
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

    public function postUpdateManufacturer($manufacturer_id, Request $request)
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

    public function getDeleteManufacturer($manufacturer_id)
    {
        $manu = Manufacturer::find($manufacturer_id)
            ->where("is_active", true)->get()[0];
        if (isset($manu)) {
            $manu->is_active = false;
            $manu->save();
            return redirect($this->ADMIN_MANUFACTURER_URL . "list")
                ->with("success", "Delete Manufacturer successfully");
        } else {
            return redirect($this->ADMIN_MANUFACTURER_URL . "list")
                ->with("error", "Manufacturer ID not exist");
        }
    }
}
