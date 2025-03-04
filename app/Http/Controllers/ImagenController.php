<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importar Auth
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImagenController extends Controller
{
    public function mostrarPerfil()
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        if (!$usuario) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión.');
        }

        return view('perfil', compact('usuario'));
    }

    public function subirImagen(Request $request)
    {
        try {
            // Validar la imagen
            $request->validate([
                'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5048'
            ]);

            // Subir la imagen a Cloudinary
            $uploadResponse = Cloudinary::upload($request->file('imagen')->getRealPath(), [
                'folder' => 'prueba'
            ]);

            // Obtener la URL segura de la imagen
            $url_image = $uploadResponse->getSecurePath();

            // Obtener el usuario autenticado
            $usuario = Auth::user();

            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            // Actualizar la foto del usuario en la base de datos
            $usuario->foto = $url_image;
            $usuario->save();

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
