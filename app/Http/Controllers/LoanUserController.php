<?php

namespace App\Http\Controllers;

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

        $data['getRecord'] = User::get();

        return view('admin.loan_user.list',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd("Yoo");
        $data['meta_title'] = 'create';
        return view('admin.loan_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
