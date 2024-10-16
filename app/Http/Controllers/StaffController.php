<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    
    public function admin_staff(Request $request){
        //dd(User::select('is_delete')->get());
        $data['getRecord'] = User::where('is_delete' ,'=', 0)->get();
        $data['meta_title'] = 'staff-list';
        return view('staff.staff_list',$data);
        
    }

     public function staff_list(Request $request){
        $data['getRecord'] = User::where('is_delete' ,'=', 0)->get();
        $data['meta_title'] = 'staff-list';
        return view('staff.staff_list',$data);
        
    }

    public function admin_add_staff(Request $request){
        //echo "Yoo";
        $data['meta_title'] = 'add_staff';
        return view('admin.add_staff',$data);
    }

    public function admin_add_staff_insert(Request $request){
       // echo ('yoo');
       // dd($request->all());

       $data = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'username' => 'required',
        'email' => 'required|unique:users',
        'is_role'=> 'required'

       ]);

       $data = new User;
       $data->first_name = trim($request->first_name);
       $data->last_name = trim($request->last_name);
       $data->email = trim($request->email);
       $data->username = trim($request->username);
       $data->dob = $request->dob;
       
       $data->is_role = $request->is_role;
       $data->mobile_number = trim($request->mobile_number);

       if(!empty($request->file('profile_picture'))){
         $file = $request->file('profile_picture');
         $randomStr = Str::random(30);
         $filename = $randomStr. '.'.$file->getClientOriginalExtension();
         $file->move('upload/profile/',$filename);
         $data->profile_picture = $filename;
       }

       $data->remember_token = Str::random(50);

       $data->save();

       return redirect('admin/staff/list')->with('success','The User has been created Successfully');

    }

    public function admin_edit_staff(Request $request,$id){
       $data['getRecord'] = User::where('id',$id)->first();
       $data['meta_title'] = 'edit_staff';
       return view('admin.edit_staff',$data);
    }


    public function staff_delete(Request $request,$id){

        $data = User::find($id);
        $data->is_delete = 1;
        $data->save();
       // $data->delete();
        return redirect('admin/staff/list')->with('error','Record Deleted Successfully');
        
    }

    public function staff_update(Request $request, $id){
        
       $data = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'username' => 'required',
        'is_role'=> 'required'

       ]);

       $data = User::find($id);
       if(!empty($request->file('profile_picture'))){
          if(!empty($data->profile_picture) && file_exists('upload/profile/'.$data->profile_picture)){
            unlink('upload/profile/'.$data->profile_picture);
          }
       }
       $data->first_name = trim($request->first_name);
       $data->last_name = trim($request->last_name);
       $data->email = trim($request->email);
       $data->username = trim($request->username);
       $data->dob = $request->dob;
       
       $data->is_role = $request->is_role;
       $data->mobile_number = trim($request->mobile_number);

       if(!empty($request->file('profile_picture'))){
         $file = $request->file('profile_picture');
         $randomStr = Str::random(30);
         $filename = $randomStr. '.'.$file->getClientOriginalExtension();
         $file->move('upload/profile/',$filename);
         $data->profile_picture = $filename;
       }

       $data->remember_token = Str::random(50);

       $data->save();

       return redirect('admin/staff/list')->with('success','The User has been created Successfully');

    }

}
