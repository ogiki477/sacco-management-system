<?php

namespace App\Http\Controllers;

use App\Models\LoanTypesModel;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\TrimmedBufferOutput;

class LoanTypesController extends Controller
{
    public function admin_loan_types(Request $request){
        // echo "Yoo";

        $data['getRecord']  = LoanTypesModel::get();

        $data['meta_title'] = 'loan_types';

        return view('admin.loan.loan_list',$data);
    }

    public function add_loan_types(Request $request){

        $data['meta_title'] = 'add_loan';

        return view('admin.loan.add_loan',$data);

        
    }

    public function add_loan_types_insert(Request $request){

        $data = $request->validate([
            'type_name' => 'required',
            'description' => 'required',

        ]);

        //dd("Yoo");
        $data = new LoanTypesModel();
        
        $data->type_name = trim($request->type_name);
        $data->description = trim($request->description);
        $data->save();

        return redirect('admin/loan/list')->with('success','Loan Successfully Added');
    }

    public function edit_loan_types(Request $request,$id){
        $data['getRecord'] = LoanTypesModel::find($id);
        $data['meta_title'] = 'edit_loan';
        return view('admin.loan.edit_loan',$data);
    }

    public function insert_edit_loan_types(Request $request , $id){
        
        //echo "Yoo";

        $data = LoanTypesModel::find($id);

        $data->type_name = trim($request->type_name);
        $data->description = trim($request->description);

        $data->save();

        return redirect('admin/loan/list')->with('success','Loan Successfully Updated');

    }

    public function delete_loan_types(Request $request,$id){
        $data = LoanTypesModel::find($id);
        $data->delete();
        return redirect('admin/loan/list')->with('error','Loan Successfully Deleted');

    }
}
