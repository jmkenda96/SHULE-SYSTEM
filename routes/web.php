<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forget-password', [AuthController::class, 'forgetPassword']);
Route::post('post/forget-password', [AuthController::class, 'postForgetPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'postResetPassword']);




Route::group(['middleware' => 'isadmin'], function(){
   Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
   Route::get('admin/list', [AdminController::class, 'index']);
   Route::get('admin/add', [AdminController::class, 'add']);
   Route::post('admin/store', [AdminController::class, 'store']);
   Route::get('admin/edit/{id}', [AdminController::class, 'edit']);
   Route::post('admin/update/{id}', [AdminController::class, 'update']);
   Route::get('admin/delete/{id}', [AdminController::class, 'delete']);
  });

Route::group(['middleware' => 'isteacher'], function(){
  Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

});

Route::group(['middleware' => 'isstudent'], function(){
  Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

});

Route::group(['middleware' => 'isparent'], function(){
  Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

});



