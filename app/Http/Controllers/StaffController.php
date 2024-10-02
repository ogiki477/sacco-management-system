<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    
    public function admin_staff(Request $request){

        $data['getRecord'] = User::get();
        $data['meta_title'] = 'staff-list';
        return view('staff.staff_list',$data);
        
    }

     public function staff_list(Request $request){

        $data['getRecord'] = User::get();
        $data['meta_title'] = 'staff-list';
        return view('staff.staff_list',$data);
        
    }

    public function admin_add_staff(Request $request){
        //echo "Yoo";
        return view('admin.add_staff');
    }

}
