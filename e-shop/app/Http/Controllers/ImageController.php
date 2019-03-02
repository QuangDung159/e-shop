<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    private $ADMIN_IMAGE_DIRECTORY = "admin.page.image.";
    private $ADMIN_IMAGE_URL = "admin/image/";
    private $IMAGE_PATH = "image/";

    public function showListImagePage()
    {
        $list_image = Image::all();
        return view($this->ADMIN_IMAGE_DIRECTORY . "list",
            [
                "list_image" => $list_image
            ]
        );
    }

    public function showCreateImagePage()
    {
        return view($this->ADMIN_IMAGE_DIRECTORY . "create");
    }

    public function postCreateImage(Request $request)
    {
        $this->validate($request,
            [
                "thumbnail" => "required"
            ],
            [
                "thumbnail.required" => "Please provide Image"
            ]
        );

        $image = new Image();
        $image->id = str_random(11);
        if ($request->hasFile("thumbnail")) {
            $file = $request->file("thumbnail");
            // get file extension
            $file_ext = $file->getClientOriginalExtension();
            if ($file_ext != "png" && $file_ext != "jpeg" && $file_ext != "jpg") {
                return redirect($this->ADMIN_IMAGE_URL . "create")
                    ->with("invalid_type", "Invalid type");
            } else {
                // get file name
                $file_name = $file->getClientOriginalName();
                $file_name_to_save = str_random(11) . $file_name;
                while (file_exists($this->IMAGE_PATH . $file_name_to_save)) {
                    $file_name_to_save = str_random(5) . $file_name;
                }
                $image->path = $file_name_to_save;
                $file->move($this->IMAGE_PATH, $file_name_to_save);
            }
        }

        $image->save();

        return redirect($this->ADMIN_IMAGE_URL . "create")
            ->with("success", "Create Image successfully");
    }

    public function showUpdateImagePage($image_id)
    {
        $image = Image::find($image_id);
        if (isset($image)) {
            return view($this->ADMIN_IMAGE_DIRECTORY . "update",
                [
                    "image" => $image
                ]
            );
        } else {
            return redirect($this->ADMIN_IMAGE_URL . "list")
                ->with("error", "Image ID not exist");
        }
    }

    public function postUpdateImage($image_id, Request $request)
    {
        $image = Image::find($image_id);
        if (isset($image)) {
            if ($request->hasFile("thumbnail")) {
                $file = $request->file("thumbnail");
                // get file extension
                $file_ext = $file->getClientOriginalExtension();
                if ($file_ext != "jpg" && $file_ext != "jpeg" && $file_ext != "png") {
                    return redirect($this->ADMIN_IMAGE_URL . "update")
                        ->with("invalid_type", "Invalid type");
                } else {
                    // get file name
                    $file_name = $file->getClientOriginalName();
                    $file_name_to_save = str_random(5) . $file_name;
                    while (file_exists($this->IMAGE_PATH . $file_name_to_save)) {
                        $file_name_to_save = str_random(11) . $file_name;
                    }
                    if ($image->path != "no_image_available.png") {
                        unlink($this->IMAGE_PATH . $image->path);
                    }
                    $image->path = $file_name_to_save;
                    $file->move($this->IMAGE_PATH, $file_name_to_save);
                }
            }

            $image->save();
            return redirect($this->ADMIN_IMAGE_URL . "update/" . $image_id)
                ->with("success", "Update Image successfully");
        } else {
            return redirect($this->ADMIN_IMAGE_URL . "list")
                ->with("error", "Image ID not exist");
        }
    }

    public function getDeleteImage($image_id)
    {
        $image = Image::find($image_id);
        if (isset($image)) {
            $image->delete();
            unlink($this->IMAGE_PATH . $image->path);
            return redirect($this->ADMIN_IMAGE_URL . "list")
                ->with("success", "Delete Image successfully");
        } else {
            return redirect($this->ADMIN_IMAGE_URL . "list")
                ->with("error", "Image ID not exist");
        }
    }
}
