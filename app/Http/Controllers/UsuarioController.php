<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Hilalahmad\PhpToastr\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
        $usuario->password = Hash::make($request->input('password'));
        $usuario->estado = $request->input('estado');
        $usuario->idSede = $request->input('idSede');
        $usuario->foto= 'https://res.cloudinary.com/dyserxzvi/image/upload/v1741126994/usuario_defecto_gynvux.png';
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
        $usuarios = Usuario::paginate(6);
        $sedes = Sede::all();
        return view('admin')->with(['usuarios'=>$usuarios, 'sedes' => $sedes]);

       
    }

    public function sedes(){
        
        return response()->json(Sede::all());
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
        $usuario->password =Hash::make($request->input('password'));
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
        
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); 
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/ini'); // Redirige a donde quieras
            $toastr = new Toastr();
            $toastr->success('Te has logueado correctamente','topRight');
        }
    
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
        
        // $usuario = Usuario::where('email', $request->email)
        //                ->where('password', $request->password)
        //                ->first();
        // if($usuario){
        //     if( $usuario->estado == true){

               
        //             $email = $request->email;
        //             $usuarios = Usuario::all();
        //             $sedes = Sede::all();
        
        //             $toastr = new Toastr();
        //             $toastr->success('Te has logueado correctamente','topRight');
        
        //             return view('inicioadminlte')->with(['email' => $email, 'usuarios' => $usuarios, 'sedes' => $sedes]); 
        //         }
            
    
        //     else {
        //         $toastr = new Toastr();
        //         $toastr->warning('El Usuario está inactivo. Intente nuevamente.','topRight'); 
        
        //         return view('login');
        //     }
        // }
        // else {
        //     $toastr = new Toastr();
        //     $toastr->warning('Datos Incorrectos. Intente nuevamente.','topRight'); 
    
        //     return view('login');
        // }
    }

    public function registro(Request $request){

        $usuario= new Usuario();
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->estado = 1;
        $usuario->idSede = $request->input('idSede');
        $usuario->foto= 'https://res.cloudinary.com/dyserxzvi/image/upload/v1741126994/usuario_defecto_gynvux.png';
        $usuario->save();

        $toastr = new Toastr();
        $toastr->success('Te has registrado correctamente','topRight');

        return view('login');
        
    }

    public function usuario($id){
        $usuario = Usuario::where('id', $id)->first();
        return response()->json($usuario,200);
    }

    public function sedeUsuario($id){
        $sede = Sede::where('id', $id)->first();
        return response()->json($sede,200);
    }
        


public function buscarUsuario($email)
{
    $usuarios = Usuario::where('email', 'LIKE', "%{$email}%")->get();

    return response()->json($usuarios, 200);
}

}