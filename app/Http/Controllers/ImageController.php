<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([    
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'option' => 'required|string',
        ]);
 
        $originalImage = $request->file('image');
        $originalPath = $originalImage->storeAs('public', 'original_image.jpg');
 
        $mimeType = $originalImage->getMimeType(); 
        switch ($mimeType) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($originalImage->getRealPath());
                $width = imagesx($image);
                $height = imagesy($image);
                break;
            case 'image/png':
                $image = imagecreatefrompng($originalImage->getRealPath());
                $width = imagesx($image);
                $height = imagesy($image);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($originalImage->getRealPath());
                $width = imagesx($image);
                $height = imagesy($image);
                break;
            default:
                break;
        }

        if ($request->option === 'grayscale') { 
            for ($y = 0; $y < $height; $y++){
                for($x = 0; $x < $width; $x++){
                    $rgb = imagecolorat($image, $x, $y); 
                    $r = ($rgb >> 16) & 0xFF;
                    $g = ($rgb >> 8) & 0xFF;
                    $b = $rgb & 0xFF;
 
                    $gray = (int) (($r + $g + $b) / 3); 
                    $grayColor = imagecolorallocate($image, $gray, $gray, $gray); 
                    imagesetpixel($image, $x, $y, $grayColor);
                }
            }
        } elseif ($request->option === 'blur') { 
            for ($y = 0; $y < $height; $y++) {
                for ($x = 0; $x < $width; $x++) {
                    $rTotal = $gTotal = $bTotal = 0;
                    $count = 0;
             
                    for ($ky = -4; $ky <= 4; $ky++) {
                        for ($kx = -4; $kx <= 4; $kx++) {
                            $nx = $x + $kx;
                            $ny = $y + $ky;
             
                            if ($nx >= 0 && $nx < $width && $ny >= 0 && $ny < $height) {
                                $rgb = imagecolorat($image, $nx, $ny);
                                $rTotal += ($rgb >> 16) & 0xFF;
                                $gTotal += ($rgb >> 8) & 0xFF;
                                $bTotal += $rgb & 0xFF;
                                $count++;
                            }
                        }
                    }
             
                    $r = (int) ($rTotal / $count);
                    $g = (int) ($gTotal / $count);
                    $b = (int) ($bTotal / $count);
             
                    $blurColor = imagecolorallocate($image, $r, $g, $b);
                    imagesetpixel($image, $x, $y, $blurColor);
                }
            } 
        }
 
        $transformedPath = storage_path('app/public/transformed_image.jpg');
        imagejpeg($image, $transformedPath);
        imagedestroy($image);

        return view('imageresult');  
    }
}