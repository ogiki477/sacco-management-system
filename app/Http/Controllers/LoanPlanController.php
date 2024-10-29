<?php

namespace App\Http\Controllers;

use App\Models\LoanPlan;
use Illuminate\Http\Request;

class LoanPlanController extends Controller
{
    public function loan_plan_list(Request $request){
        //dd("Yooo");
        $data['getRecord'] = LoanPlan::get();
        $data['meta_title'] = 'loan_plan';

        return view('admin.loanplan.list',$data);
    }

    public function loan_plan_add(Request $request){
        
        $data['meta_title'] = 'add_loan_plan';

        return view('admin.loanplan.add',$data);

    }

    public function insert_loan_plan_add(Request $request){
        //dd('Yoo');

        $data = $request->validate([
            'Months' => 'required',
            'interest_percentage' => 'required',
            'penalty_rate' => 'required'
        ]);

        $data = new LoanPlan();
        
        $data->interest_percentage =  trim($request->interest_percentage);
        $data->Months = trim($request->Months);
        $data->penalty_rate = trim($request->penalty_rate);

        $data->save();

        return redirect('admin/loan_plan/list')->with('success','The Loan Plan has been successfully Added');

    }

    public function edit_loan_plan_add(Request $request,$id){

        //dd('Yoo');
        $data['meta_title'] =  'edit_loanplan';
        $data['getRecord'] = LoanPlan::find($id);

        return view('admin.loanplan.edit',$data);

    }

    public function insert_edit_loan_plan_add(Request $request,$id){
       // dd('Yoo');

       $data = LoanPlan::find($id);

       $data->Months = trim($request->Months);
       $data->interest_percentage = trim($request->interest_percentage);
       $data->penalty_rate = trim($request->penalty_rate);

       $data->save();

       return redirect('admin/loan_plan/list')->with('success','The Loan Plan has been Updated Successfully');
    }

    public function delete_loan_plan_add(Request $request,$id){
        //dd('Yoo');
        $data = LoanPlan::find($id);
        $data->delete();

        return redirect('admin/loan_plan/list')->with('error','The Loan Plan has been Deleted');
    }
}