<?php

namespace App\Http\Controllers;

use \stdClass;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){

        // $validator = Validator::make($request->all(),[
        //     'email' => 'required|string|email|max:255',
        //     'password' => 'required|string|min:2'
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->error());
        // }

        // $user = Usuario::create([
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()->json(['data' => $user,'accese_token' => $token, 'token_type' => 'Bearer', ]);
    }
    public function login(Request $request){
        // if(!Auth::attempt($request->only('email','password'))){
        //     return response()
        //         ->json(['message' => 'Unathorized'], 401);
        // }

        // $user = Usuario::where('email', $request['email'])->firstOrFail();

        // $token = $user->createToken('auth_token')->plainTextToken;

        // return response()
        //     ->json([
        //         'message' => 'Hi '.$user->emai,
        //         'accessToken' => $token,
        //         'token_type' => 'Bearer',
        //         'user' => $user,
        //     ]);
    }

    public function logout(){
        // auth()->user()->token()->delete();

        // return [
        //     'message' => 'Has hecho el logout de forma c'
        // ];
    }
}
