<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function checkUser(Request $request) {
        token = $request->input('email');
    }
}
