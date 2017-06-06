<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function checkuser(Request $request)
    {
        $token = $request->input('token');
        $userbytoken = DB::table('auth_sessions')->where('token', $token)->first();
        $currenttime = date('Y-m-d H:m:s');
        if($userbytoken){
            if ($userbytoken->expiry_time > $currenttime) {
                $user = DB::table('users')->where('id', $userbytoken->user_id)->first();
                $array = array_add(['name' => $user->name], 'email', $user->email);
                if ($user) {
                    return $array;
                } else {
                    return false;
                }
            } else {
                return "expire";
            }
        } else {
            return "expire";
        }

//
    }


}
