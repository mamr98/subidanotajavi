<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function all(){
        $usuarios = User::all();
        return response()->json($usuarios);
    }

}
