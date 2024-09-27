<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public function register_create(Request $request){
        //dd($request->all());

        $data = $request->validate([

            'first_name'=> 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:4',



        ]);

        $data = new User();
        $data->first_name = trim($request->first_name);
        $data->last_name = trim($request->last_name);
        $data->username = trim($request->username);
        $data->email = trim($request->email);
        $data->password = Hash::make($request->password);
        $data->remember_token = Str::random(50);

        $data->save();

        return redirect('')->with('success','Successfully registered');
        


    }

    public function login_post(Request $request){
       // dd($request->all());

       if(Auth::attempt(['email'=> $request->email,'password'=>$request->password],true)){

        if(Auth::User()->is_role == '1'){

            return redirect()->intended('admin/dashboard');

        }elseif(Auth::User()->is_role == '0'){

            return redirect()->intended('staff/dashboard');

        }else{
            return redirect()->back()->with('error','Wrong Credentials!!');
        }

       }else{
        return redirect()->back()->with('error','Wrong Credentials!!');
       }

        }



        public function logout(Request $request)
        {
            Auth::logout(); // Log out the user
            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate the CSRF token
        
            return redirect(''); // Redirect to the login page (or home page if needed)
        }
        
}
