<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
 public function dashboard(){

    $user= Auth::user();

    if($user->user_type==1){
       return view('admin.dashboard');   
    }else if($user->user_type==2){
        return view('teacher.dashboard');   
     } else if($user->user_type==3){
         return view('student.dashboard');   
     } else if($user->user_type==4){
        return view('parent.dashboard');   
     }

     return redirect(url('/'))->with('error' , 'unauthorized access');
    }
}
