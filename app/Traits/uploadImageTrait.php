<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

trait UploadImageTrait
{

    public function storeImage($image , $disk , $foreginId)
    {

        if ($image->isValid()) {

            $imageName = 'product-' . time() . '.' . $image->getClientOriginalExtension();

            $image = Storage::disk('products')->put('images/'. $imageName , file_get_contents($image));
            $imagePath = 'images/' . $imageName;
            Image::create([
                'name' => $imageName,
                'product_id'=> $foreginId,
                'path' => $imagePath,
            ]);
        }

    }
}
