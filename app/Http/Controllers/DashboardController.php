<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        //dd("yoo");
        
        if(Auth::user()->is_role == 1){

            $data['meta_title'] = 'admin-dashboard';

            return view('admin.dashboard.admindashboard',$data);

        }elseif(Auth::user()->is_role == 0) {
            $data['meta_title'] = 'staff-dashboard';
            $data['getRecord'] = User::get();

            return view('staff.dashboard.staffdashboard',$data);
        }
        
    }

}
