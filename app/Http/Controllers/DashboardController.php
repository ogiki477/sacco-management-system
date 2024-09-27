<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        //dd("yoo");
        
        if(Auth::user()->is_role == 1){

            $data['meta_title'] = 'admin-dashboard';

            return view('admin.dashboard.list',$data);

        }elseif(Auth::user()->is_role == 0) {
            $data['meta_title'] = 'staff-dashboard';

            return view('admin.staff.list',$data);
        }
        
    }

}
