<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class UserController extends Controller {

    public function checkuser(Request $request) {

        try {
            $token = $request->input('token');
            $userbytoken = DB::table('auth_sessions')->where('token', $token)->first();
            $currenttime = date('Y-m-d H:m:s');
            if ($userbytoken) {
                if ($userbytoken->expiry_time > $currenttime) {
                    $user = DB::table('users')->where('id', $userbytoken->user_id)->first();
                    $array = array_add(['name' => $user->name, 'cur' => $user->currency], 'email', $user->email);
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
        } catch (\Exception $e) {
            return response()->json([
                        'message' => 'Record not found',
                            ], 404);
        }


//
    }

    public function signup(Request $request) {

//        return bcrypt($request->input('pass'));

        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'pass' => 'required|min:4'
        ]);

        $email = $request->input('email');
        $password = $request->input('pass');
        $cpassword = $request->input('cpass');

        if ($password == $cpassword) {
            $user = new User([
                'name' => $email,
                'username' => $request->input('username'),
                'email' => $email,
                'password' => bcrypt($password)
            ]);
            $user->save();
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return "success";
        } else {
            return "error";
        }
    }

}
