<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanPlanController;
use App\Http\Controllers\LoanTypesController;
use App\Http\Controllers\LoanUserController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[AuthController::class,'login']);
Route::post('login_post',[AuthController::class,'login_post']);
Route::get('register',[AuthController::class,'register']);
Route::post('register',[AuthController::class,'register_create']);

Route::get('forgot',[AuthController::class,'forgot']);

Route::group(['middleware' => 'Admin'],function(){
    Route::get('admin/dashboard',[DashboardController::class,'dashboard']);
    Route::get('admin/staff/list',[StaffController::class,'admin_staff']);
    Route::get('admin/staff/add',[StaffController::class,'admin_add_staff']);
    Route::post('admin/staff/add',[StaffController::class,'admin_add_staff_insert']);
    Route::get('admin/staff/edit/{id}',[StaffController::class,'admin_edit_staff']);
    Route::get('admin/staff/delete/{id}',[StaffController::class,'staff_delete']);
    Route::post('admin/staff/update/{id}',[StaffController::class,'staff_update']);
    Route::get('admin/loan/list',[LoanTypesController::class,'admin_loan_types']);
    Route::get('admin/loan_types/add',[LoanTypesController::class,'add_loan_types']);
    Route::post('admin/loan_types/add',[LoanTypesController::class,'add_loan_types_insert']);
    Route::get('admin/loan_type/edit/{id}',[LoanTypesController::class,'edit_loan_types']);
    Route::post('admin/loan_type/edit/{id}',[LoanTypesController::class,'insert_edit_loan_types']);
    Route::get('admin/loan_type/delete/{id}',[LoanTypesController::class,'delete_loan_types']);
    Route::get('admin/loan_plan/list',[LoanPlanController::class,'loan_plan_list']);
    Route::get('admin/loan_plan/add',[LoanPlanController::class,'loan_plan_add']);
    Route::post('admin/loan_plan/add',[LoanPlanController::class,'insert_loan_plan_add']);
    Route::get('admin/loan_plan/edit/{id}',[LoanPlanController::class,'edit_loan_plan_add']);
    Route::post('admin/loan_plan/edit/{id}',[LoanPlanController::class,'insert_edit_loan_plan_add']);
    Route::get('admin/loan_plan/delete/{id}',[LoanPlanController::class,'delete_loan_plan_add']); 

    //loan menu
    Route::get('admin/loans/list',[LoanController::class,'index']);    
    Route::get('admin/loans/add',[LoanController::class,'create']);    


    //Loan User 
    Route::get('admin/loan_user/list',[LoanUserController::class,'index']);
    Route::get('admin/loan_user/add',[LoanUserController::class,'create']);


    



    
});

Route::group(['middleware'=>'Staff'],function(){
    Route::get('staff/dashboard',[DashboardController::class,'dashboard']);
    Route::get('staff\list',[StaffController::class,'staff_list']);
});


Route::get('logout',[AuthController::class,'logout']);
