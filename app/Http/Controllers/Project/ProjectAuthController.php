<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class ProjectAuthController extends Controller
{
    public function create(){
        return view('Project-Panel\Auth\Login');
    }

    public function store(Request $request){

        $request ->validate([
                'email' =>'required|email',
                'password'=>'required',

        ]);

        $credentials = $request ->only('email','password');

        if(Auth::guard('project')->attempt($credentials)){

            $user = Project::where('email',$request->input('email'))->first();
            Auth::guard('project')->login($user);
            return redirect()->route('project.dashboard')->with('success','Login Successful');
        }else{
            return redirect()->route('project_login')->with('error','Login unsuccessful');
        }
    }

    public function logout(Request $request){

        Auth::guard('project')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('project_login')->with('Success','Logout successfully');
    }

}
