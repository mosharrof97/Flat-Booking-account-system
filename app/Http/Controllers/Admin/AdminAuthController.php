<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    public function login(){
        return view('AdminLogin');
    }

    public function login_submit(Request $request){

        $request ->validate([
                'email' =>'required|email',
                'password'=>'required',

        ]);

        $credentials = $request ->only('email','password');

        if(Auth::guard('admin')->attempt($credentials)){

            $user = Admin::where('email',$request->input('email'))->first();
            Auth::guard('admin')->login($user);
            return redirect()->route('admin_dashboard')->with('success','Login Successful');
        }else{
            return redirect()->route('admin_login')->with('error','Login unsuccessful');
        }
    }

    public function logout(){

        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('Success','Logout successfully');
    }



        // $url = '';
        // if ($request->user()->role == 'admin') {
        //     $url=view('dashboard');
        // }
        // elseif($request->user()->role == 'user' ){
        //     $url = view('userDashboard');
        // }
        // else{
        //     $url = '/login';
        // }
        // return redirect()->intended($url );
}
