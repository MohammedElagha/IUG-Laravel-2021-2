<?php

namespace App\Http\Traits;

trait CarTrait {

    
	public function upload_image($file) {
        $name = time() + rand(1, 100000000);
        $ext = $file->getClientOriginalExtension();
        $path = "uploads/cars/$name.$ext";

        Storage::disk('local')->put($path, file_get_contents($file));

        if (file_exists(storage_path($path))) {

        }

        return $path;
    }


    public function compute_price ($price) {
        $final_price = ((50/100) * $price) + $price;

        return $final_price;
    }

}