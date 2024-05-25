<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientDashboardController extends Controller
{
    public function dashboard(){
        $authId = auth()->guard('client')->id();

        $client = Client::where('id',$authId)->first();
        $data = [
            'client' => $client,
        ];
        return view('Client-Panel.dashboard',$data);
    }
}
