<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Hilalahmad\PhpToastr\Toastr;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $usuario= new Usuario();
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->rol = $request->input('rol');
        $usuario->estado = true;
        $usuario->idSede = $request->input('idSede');;
        $usuario->save();

        return response()->json(['mensaje' => 'Usuario creado correctamente'], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $usuarios = Usuario::all();
        return view('admin')->with(['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $email)
    {
        $usuario = Usuario::where('email', $email)->first();
        $usuario->password = $request['password'];
        $usuario->save();
        return response()->json(['mensaje' => 'Usuario actualizado correctamente'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($email)
    {
        $usuario = Usuario::where('email', $email)->first();
        $usuario->delete(); 
        return response()->json(['mensaje' => 'Usuario eliminado correctamente'], 201);
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)
                       ->where('password', $request->password) // Aquí agregas el segundo parámetro
                       ->first();
        
        if ($usuario->rol === "usuario") {
            return view('welcome');

        } 

        if ($usuario->rol === "administrador") {
            return redirect()->route('administrador'); 

        } 
        
        else {
            $toastr = new Toastr();
            $toastr->warning('Datos incorrectos. Intente nuevamente.','topRight'); 
    
            return view('login');
        }
    }
    

    public function logout(Request $request){
        /* Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush(); //limpiar sesion */

        return redirect()->route('login'); 
}
}
