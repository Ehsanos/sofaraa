<?php

namespace App\Http\Controllers\core;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\File;

class projectCoreController extends BaseController
{
    public function updateImage($images, $oldImages, $path)
    {
        $this->deleteImagesArray($oldImages, $path);
        return $this->storeImages($images, $path);
    }

    // this function do store image and return list of new name images

    public function deleteImagesArray($images, $path)
    {
        foreach ($images as $image) {
            $fullPathImage = public_path($path . '/' . $image);
            if (File::exists($fullPathImage)) {
                File::delete($fullPathImage);
            }
        }
    }

    public function storeImages($images, $path)
    {
        $images_names = [];
        foreach ($images as $image) {
            $name = $image->getClientOriginalName();
            $newNameImage = time() . '_' . $name;
            $path = public_path($path);
            $image->move($path, $newNameImage);
            array_push($images_names, $newNameImage);
        }
        return $images_names;
    }
}
