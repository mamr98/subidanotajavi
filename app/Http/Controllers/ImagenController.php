<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Cloudinary\Asset\Image;
use Illuminate\Http\Request;
use Cloudinary\Transformation\Format;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Delivery;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImagenController extends Controller
{
    public function subirImagen(Request $request)
{
    try {
        $request->validate([
            'imagen' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $uploadResponse = Cloudinary::upload($request->file('imagen')->getRealPath(), [
            'folder' => 'prueba'
        ]);

        $publicID_image = $uploadResponse->getPublicId();
        
        $url_image = (string)(new Image($publicID_image))
            ->resize(Resize::scale()->width(250))
            ->delivery(Delivery::quality(35))
            ->delivery(Delivery::format(Format::auto()));

            $usuario = Usuario::find($url_image);    
            $usuario->image = $request->input('image');

        return response()->json([
            'success' => true,
            'url' => $url_image
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->validator->errors()->first()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al subir la imagen: ' . $e->getMessage()
        ], 500);
    }
}    
}
