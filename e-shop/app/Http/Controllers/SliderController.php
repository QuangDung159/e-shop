<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $ADMIN_SLIDER_DIRECTORY = "admin.page.slider.";
    private $ADMIN_SLIDER_URL = "admin/slider/";
    private $IMAGE_PATH = "image/slide/";

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

    public function postCreateSlider(Request $request)
    {
        $this->validate($request,
            [
                "slider_name" => "required|min:3|max:255",
                "slider_link" => "required|min:3|max:255"
            ],
            [
                "slider_name.required" => "Please provide Slider Name",
                "slider_name.max" => "Too long",
                "slider_name.min" => "too short",

                "slider_link.required" => "Please provide Slider Link",
                "slider_link.max" => "Too long",
                "slider_link.min" => "Too short"
            ]
        );

        $slider = new Slider();
        $slider->name = $request->slider_name;
        $slider->link = $request->slider_link;
        $slider->id = str_random(11);

        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            // get file extension
            $file_ext = $file->getClientOriginalExtension();
            if ($file_ext != "png" && $file_ext != "jpeg" && $file_ext != "jpg") {
                return redirect($this->ADMIN_SLIDER_URL . "create");
            } else {
                // get file name
                $file_name = $file->getClientOriginalName();
                $file_name_to_save = str_random(11) . $file_name;
                while (file_exists($this->IMAGE_PATH . $file_name_to_save)) {
                    $file_name_to_save = str_random(11) . $file_name;
                }
                $slider->path = $file_name_to_save;
                $file->move($this->IMAGE_PATH, $file_name_to_save);
            }
        }

        $slider->save();

        return redirect($this->ADMIN_SLIDER_URL . "create")
            ->with("success", "Create Slider successfully");
    }

    public function showUpdateSliderPage($slider_id)
    {
        $slider = Slider::where("id", $slider_id)
            ->where("is_active", true)->get()[0];
        if (isset($slider)) {
            return view($this->ADMIN_SLIDER_DIRECTORY . "update",
                [
                    "slider" => $slider
                ]
            );
        } else {
            return redirect($this->ADMIN_SLIDER_URL . "list")
                ->with("error", "Slider ID not exist");
        }
    }

    public function postUpdateSlider($slider_id, Request $request)
    {
        $slider = Slider::where("id", $slider_id)
            ->where("is_active", true)->get()[0];
        if (isset($slider)) {
            $this->validate($request,
                [
                    "slider_name" => "required|min:3|max:255",
                    "slider_link" => "required|min:3|max:255"
                ],
                [
                    "slider_name.required" => "Please provide Slider Name",
                    "slider_name.max" => "Too long",
                    "slider_name.min" => "too short",

                    "slider_link.required" => "Please provide Slider Link",
                    "slider_link.max" => "Too long",
                    "slider_link.min" => "Too short"
                ]
            );

            $slider->name = $request->slider_name;
            $slider->link = $request->slider_link;

            if ($request->hasFile("thumbnail")) {
                $file = $request->file("thumbnail");
                // get file extension
                $file_ext = $file->getClientOriginalExtension();
                if ($file_ext != "jpg" && $file_ext != "jpeg" && $file_ext != "png") {
                    return redirect($this->ADMIN_SLIDER_URL . "update")
                        ->with("invalid_type", "Invalid type");
                } else {
                    // get file name
                    $file_name = $file->getClientOriginalName();
                    $file_name_to_save = str_random(11) . $file_name;
                    while (file_exists($this->IMAGE_PATH . $file_name_to_save)) {
                        $file_name_to_save = str_random(11) . $file_name;
                    }
                    if ($slider->path != "no_image.png") {
                        unlink($this->IMAGE_PATH . $slider->path);
                    }
                    $slider->path = $file_name_to_save;
                    $file->move($this->IMAGE_PATH, $file_name_to_save);
                }
            }

            $slider->save();
            return redirect($this->ADMIN_SLIDER_URL . "update/" . $slider_id)
                ->with("success", "Update Slider successfully");
        } else {
            return redirect($this->ADMIN_slider_URL . "list")
                ->with("error", "Slider ID not exist");
        }
    }

    public function getDeleteSlider($slider_id)
    {
        $slider = Slider::where("id", $slider_id)
            ->where("is_active", true)->get()[0];
        if (isset($slider)) {
            $slider->is_active = false;
            $slider->save();
            return redirect($this->ADMIN_SLIDER_URL . "list")
                ->with("success", "Delete Slider successfully");
        } else {
            return redirect($this->ADMIN_SLIDER_URL . "list")
                ->with("error", "Slider ID not exist");
        }
    }
}
