<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facdes\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use \stdClass;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:2'
        ]);

        if($validator->fails()){
            return response()->json($validator->error());
        }

        $user = Usuario::create([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data' => $user,'accese_token' => $token, 'token_type' => 'Bearer', ]);
    }
}
