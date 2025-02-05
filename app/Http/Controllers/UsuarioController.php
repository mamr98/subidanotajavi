<?php

namespace App\Http\Controllers;

use App\Models\Sede;
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
        $usuario->estado = $request->input('estado');
        $usuario->idSede = $request->input('idSede');
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
        $sedes = Sede::all();
        return view('admin')->with(['usuarios'=>$usuarios, 'sedes' => $sedes]);
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
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
    
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->rol = $request->input('rol');
        $usuario->estado = $request->input('estado');
        $usuario->idSede = $request->input('idSede');
        $usuario->save();
    
        return response()->json(['mensaje' => 'Usuario actualizado correctamente'], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::where('id', $id)->first();
        $usuario->delete(); 
        return response()->json(['mensaje' => 'Usuario eliminado correctamente'], 201);
    }

    public function desactivar($id)
    {
        $usuario = Usuario::where('id', $id)->first();
        $usuario->estado = 0;
        $usuario->save();
        return response()->json(['mensaje' => 'Usuario eliminado correctamente'], 201);
    }

    public function activar($id)
    {
        $usuario = Usuario::where('id', $id)->first();
        $usuario->estado = 1;
        $usuario->save();
        return response()->json(['mensaje' => 'Usuario eliminado correctamente'], 201);
    }


    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)
                       ->where('password', $request->password)
                       ->first();
        if($usuario){
            if( $usuario->estado == true){

                if ($usuario->rol === "usuario") {
                    $email = $request->email;
                    return view('welcome')->with(['email' => $email]);
        
                } 
        
                if ($usuario->rol === "administrador") {
                    return redirect()->route('administrador'); 
        
                } 
                }
            
    
            else {
                $toastr = new Toastr();
                $toastr->warning('El Usuario está inactivo. Intente nuevamente.','topRight'); 
        
                return view('login');
            }
        }
        else {
            $toastr = new Toastr();
            $toastr->warning('Datos Incorrectos. Intente nuevamente.','topRight'); 
    
            return view('login');
        }
    }

    public function usuario($id){
        $usuario = Usuario::where('id', $id)->first();
        return response()->json($usuario,200);
    }

    public function sedeUsuario($id){
        $sede = Sede::where('id', $id)->first();
        return response()->json($sede,200);
    }
        

        

    

    public function logout(Request $request){
        /* Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flush(); //limpiar sesion */

        return redirect()->route('login'); 
}
}
