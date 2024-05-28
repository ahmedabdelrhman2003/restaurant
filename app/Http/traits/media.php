<?php

namespace App\Http\traits;

use Illuminate\Support\Str;

trait media
{
    public function uploadPhoto($image, $folder)
    {

        $photoName = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/img/' . $folder), $photoName);
        return $photoName;
    }
    public function deletePhoto($photoPath)
    {
        if (file_exists($photoPath)) {
            # code...
            unlink($photoPath);
            return true;
        }
        return false;
    }
}