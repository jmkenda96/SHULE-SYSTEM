<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authlogin']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});



Route::get('admin/list', function () {
    return view('admin.index');
});

Route::group(['middleware' => 'isadmin'], function(){
   Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
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



