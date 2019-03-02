<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{
    private $ADMIN_GALLERY_DIRECTORY = "admin.page.gallery.";
    private $ADMIN_GALLERY_URL = "admin/gallery/";
    private $IMAGE_PATH = "image/";

    // Route Page Methods

    public function showListGalleryPage()
    {
        $list_gallery = Gallery::all();
        return view($this->ADMIN_GALLERY_DIRECTORY . "list",
            [
                "list_gallery" => $list_gallery
            ]
        );
    }

    public function showCreateGalleryPage()
    {
        $list_product = Product::where("is_active", true)->get();
        $list_image = DB::select("select i.* from image i left join gallery g on i.id = g.image_id where g.image_id is null");
        return view($this->ADMIN_GALLERY_DIRECTORY . "create",
            [
                "list_product" => $list_product,
                "list_image" => $list_image
            ]
        );
    }

    public function showUpdateGalleryPage($product_id)
    {
        $gallery = Gallery::where("product_id", $product_id);
        $product = Product::find($product_id);
        $list_image = DB::select("select i.* from image i left join gallery g on i.id = g.image_id where g.image_id is null");
        if (isset($gallery)) {
            return view($this->ADMIN_GALLERY_DIRECTORY . "update",
                [
                    "gallery" => $gallery,
                    "product" => $product,
                    "list_image" => $list_image
                ]
            );
        } else {
            return redirect($this->ADMIN_GALLERY_URL . "list")
                ->with("error", "Gallery ID not exist");
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

    // End Page Route Methods

//----------------------------------------------------------

    // Route Webservices Methods

    public function postCreateGallery(Request $request)
    {
        $this->validate($request,
            [
                "product_id" => "required"
            ],
            [
                "product_id.required" => "Please provide Product Name"
            ]
        );

        $list_image = json_decode($request->list_image_to_add);
        foreach ($list_image as $item) {
            $gallery = new Gallery();
            $gallery->product_id = $request->product_id;
            $gallery->image_id = $item->id;
            $gallery->save();
        }

        return response([
            "result" => "success"
        ], 200);
    }

    // End Route Webservices Methods
}
