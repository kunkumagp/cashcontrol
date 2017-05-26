<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\AuthSession;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt([
            'email'=>$email,
            'password'=> $password
        ])){
            $user = Auth::user();
            $authSession = new AuthSession();
            $authSession->expiry_time = date('Y-m-d H:i:s', time() + 7200);
            $authSession->token = Hash::make($authSession->expiry_time . $user->username);

            $user->authSessions()->save($authSession);

            $authSession['user'] = $user;

            return $authSession;

        } else{
            return "error";
        }


//        if(Auth::attempt(['email' => $email, 'password' => $password])) {
//            return redirect()->route('user.profile');
////            $msg = "success!";
////            return $msg;
//        }
//        else{
//            return "error!";
//        }

    }
}
