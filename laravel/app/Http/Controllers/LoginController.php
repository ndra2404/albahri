<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function doLogin(Request $req){
        $data = [
            'username' => $req->input('email'),
            'password' => $req->input('password'),
        ];
        if (Auth::Attempt($data)) {
            return redirect('/');
        }else{
            return redirect('/login')->with([
                'status'=>'alert-danger',
                'message' => 'Email atau Password Salah',
            ]);
        }
    }
    public function doLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
