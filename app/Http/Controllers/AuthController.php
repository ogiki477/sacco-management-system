<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $data['meta_title'] = 'login';
        return view('auth.login',$data);
    }

    public function register(Request $request){
        $data['meta_title'] = 'register';
        return view('auth.register',$data);
    }

    public function forgot(Request $request){
        $data['meta_title'] = 'forgot-password';
        return view('auth.forgot',$data);    
    }
}
