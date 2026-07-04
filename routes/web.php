<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authlogin']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});



Route::get('admin/admin', function () {
    return view('admin.index');
});

Route::group(['middleware' => 'isadmin'], function(){
    Route::get('admin/dashboard' , function(){
        return view('admin.dashboard');
    });
});

Route::group(['middleware' => 'isteacher'], function(){
     Route::get('teacher/dashboard' ,  function(){
        return view('admin.dashboard');   
     });
});

Route::group(['middleware' => 'isstudent'], function(){
    Route::get('student/dashboard' ,  function(){
        return view('student.dashboard');
    });

});

Route::group(['middleware' => 'isparent'], function(){
    Route::get('parent/dashboard' ,  function(){
        return view('parent.dashboard');   
     });
});



