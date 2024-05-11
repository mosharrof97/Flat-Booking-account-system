<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ClientLoginRequest;
use App\Models\Client;
use Auth;

class ClientAuthController extends Controller
{
    public function create(){

        return view('Client-Panel.Auth.Login');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        dd($credentials);
        if (Auth::guard('client')->attempt($credentials)) {
            $user = Auth::guard('client')->user(); // Get the authenticated client user
            Auth::guard('admin')->login($user); // Log in the user as admin
            return redirect()->route('admin_dashboard')->with('success', 'Login Successful');
        } else {
            return redirect()->route('admin_login')->with('error', 'Login unsuccessful');
        }

        // dd($request->authenticate());
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->route('client.dashboard');
    }


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('client.login');
    }
}
