<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function checkUser(Request $request) {
        $token = $request->input('token');
        if(Auth::check([
            'token'=>$token
        ])){
            return "success!";
        }
    }
}
