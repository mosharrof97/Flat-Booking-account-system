<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Flat;

class ClientDashboardController extends Controller
{
    public function dashboard(){
        $authId = auth()->guard('client')->id();

        $client = Client::where('id',$authId)->first();
        return view('Client-Panel.dashboard',compact('client'));
    }
}
