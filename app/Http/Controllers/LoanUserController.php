<?php

namespace App\Http\Controllers;

use App\Models\LoanUser;
use App\Models\User;
use Illuminate\Http\Request;

class LoanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('YOO');
        $data['meta_title' ] = 'users';

        $data['getRecord'] = LoanUser::get();

        return view('admin.loan_user.list',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("Yoo");
        $data['meta_title'] = 'add_user';
        //$data['getRecord'] = LoanUser::get();
        return view('admin.loan_user.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd("Yoo");
        $data = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:loan_user',
            'tax_id' => 'required'

        ]);

        $data = new LoanUser();

       

        $data->first_name = trim($request->first_name);
        $data->last_name = trim($request->last_name);
        $data->address = trim($request->address);
        $data->contact = trim($request->contact);
        $data->email = trim($request->email);
        $data->tax_id = trim($request->tax_id);

        $data->save();

        return redirect('admin/loan_user/list')->with('success','The loan User is Successfully Added');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
