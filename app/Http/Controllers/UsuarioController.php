<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

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
        $usuario->email = $request['email'];
        $usuario->password = $request['password'];
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
}
