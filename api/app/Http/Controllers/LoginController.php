<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AuthSession;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {

    public function login(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt([
                    'username' => $username,
                    'password' => $password
                ])) {
            $user = Auth::user();
            $authSession = new AuthSession();
            $authSession->expiry_time = date('Y-m-d H:i:s', time() + 7200);
            $authSession->token = Hash::make($authSession->expiry_time . $user->username);

            $user->authSessions()->save($authSession);

            $authSession['user'] = $user;

            return $authSession;
        } else {
            return "error";
        }
    }
    
    public function autoLogin(Request $request) {
        $username = $request->username;
        $password = $request->pass;
        
//        return $username .'<br/>'.$password;

        if (Auth::attempt([
                    'username' => $username,
                    'password' => $password
                ])) {
            $user = Auth::user();
            $authSession = new AuthSession();
            $authSession->expiry_time = date('Y-m-d H:i:s', time() + 7200);
            $authSession->token = Hash::make($authSession->expiry_time . $user->username);

            $user->authSessions()->save($authSession);

            $authSession['user'] = $user;

            return $authSession;
        } else {
            return "error";
        }
    }

}
