<?php

namespace App\Traits;

trait storeImage
{
    public function storeImage($file, $file_name)
    {
        $file->store($file_name, 'public');
        return "storage/" . $file_name . "/" . $file->hashName();
    }

    public function storeWithoutDeleteing($item, $file, $file_name)
    {
        // dd($item);
        $file->store($file_name, 'public');
        $path = "storage/" . $file_name . "/" . $file->hashName();
        $item->image()->create([
            "origin_name" => $file->getClientOriginalName(),
            "new_name" => $file->hashName(),
            "image_url" => $path
        ]);

        return true;
    }
}

