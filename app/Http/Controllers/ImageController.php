<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create(Request $request){

        //dd($request->file);
        $tempImage = $request->file;
        $text = $request->text;
        $ch1 = $request->ch1;
        $watermark = $request->watermark;

        $image = new Image;
        $image->uploadImage($tempImage, $text, $ch1, $watermark);


    }

    public function getText(Request $request){
        dd(key($request->all()));
    }
}
