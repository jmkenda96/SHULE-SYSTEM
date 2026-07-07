<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgetPasswordMail;
use Mail;

class AuthController extends Controller
{
    public function login(){

        if(!empty(Auth::check())){
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }

    public function authLogin(Request $request){

        $remember = !empty($request->remember) ? true:false;

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $remember))
           {

            if(Auth::user()->user_type==1)
            {
              return  redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type==2)
            {
                return redirect('teacher/dashboard');  
            }
             else if(Auth::user()->user_type==3)
            {
                return redirect('student/dashboard');  
            }
             else if(Auth::user()->user_type==4)
            {
                return redirect('parent/dashboard');  
            }
        }
     else{
         return redirect()->back()->with('error', 'Invalid email or password');
    }
  }
    
     public function logout(){
        Auth::logout();
        return redirect(url('/'));
     }

     public function forgetPassword(){
        return view('auth.forgetPassword');
     }

     public function postForgetPassword(Request $request){

        $user= User::getEmailSIngle($request->email);
        
        if(!empty($user))
        {
            $user->remember_token = \Str::random(30);
            $user->save();
            sleep(1);
            Mail::to($user->email)->send(new ForgetPasswordMail($user));
            return redirect()->back()->with('success', 'Please check your email to reset your password');
            
        }

        else{
            return redirect()->back()->with('error', 'email is not found in our system');
        } 
     }

     public function reset($token){
        $user=User::getTokenSingle($token);
        if(!empty($user))
        {
            $data['user'] = $user;
            $data['token'] = $token;
            return view('auth.reset',$data);
        }
        else{
            return redirect()->back()->with('error', 'Invalid token');
        }
     }

     public function postResetPassword($token, Request $request){

     if($request->password != $request->password_confirmation)
     {
        return redirect()->back()->with('error', 'Password and confirm password are not same');
     }
     else{
         $user=User::getTokenSingle($token);
        if(!empty($user))
        {
            $user->password = Hash::make($request->password);
            $user->remember_token = \Str::random(30);
            $user->save();
            return redirect(url('/'))->with('success', 'Password reset successfully');
        }
        else{
            return redirect()->back()->with('error', 'Invalid token');
        }
     }

        
     }
}
