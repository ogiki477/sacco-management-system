<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    
    public function staff(Request $request){

        $data['meta_title'] = 'staff';
        return view('admin.staff.list',$data);
    }
}
