<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{



    public function uploadImage($image, $text, $ch1, $watermark)
    {

        if ($image != null)
        {
            $name = str_random(10) . '.' . $image->extension();
            $newImage = $image->move(public_path() . '/uploads',$name);

            $img = \Intervention\Image\Facades\Image::make($newImage);

            $colorPoints = [];

            for ($i=20; $i < $img->height(); $i+=5){
                array_push($colorPoints, $img->pickColor($i, $i)[0]);
            }

            $tone = array_sum($colorPoints)/count($colorPoints);


            if ($watermark == 1 || $watermark == true){
                $img->insert('watermark.png', 'bottom-right');
            }

            $imgHeight = $img->height() - 50;
            $imgWidth = $img->width() - 50;

            if ($ch1 == true || $ch1 == 1){
                $img->text($text, $imgWidth , $imgHeight, function($font) use($tone) {
                    $font->file( public_path() . '/' . 'font.ttf');
                    $font->size(36);


                    if ($tone > 128){
                        $font->color('#000');
                    }else{
                        $font->color('#fff');
                    }
                    $font->align('right');
                    $font->valign('bottom');
                });
            }


            $img->save('uploads/' . $name);

            $this->title = $name;
            $this->save();

            //return $name;
//            $this->avatar = $name;
//            $this->save();
        }
    }


}
