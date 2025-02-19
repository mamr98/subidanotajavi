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
    public function mostrarPerfil()
    {
        // Obtener el usuario actual (puedes cambiar esto según tu lógica de autenticación)
        $usuario = Usuario::find(1); // Obtener el usuario con ID 1

        // Pasar el usuario a la vista
        return view('perfil', compact('usuario'));
    }

    public function subirImagen(Request $request)
    {
        try {
            $request->validate([
                'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5048'
            ]);

            $uploadResponse = Cloudinary::upload($request->file('imagen')->getRealPath(), [
                'folder' => 'prueba'
            ]);

            $publicID_image = $uploadResponse->getPublicId();

            $url_image = (string)(new Image($publicID_image))
                ->resize(Resize::scale()->width(250))
                ->delivery(Delivery::quality(35))
                ->delivery(Delivery::format(Format::auto()));

            $usuario = Usuario::find(1); // Obtener el usuario con ID 1
            if ($usuario) {
                $usuario->imagen = $url_image;
                $usuario->save(); // Guardar los cambios en la base de datos
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'url' => $url_image
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al subir la imagen: ' . $e->getMessage()
            ], 500);
        }
    }
}
