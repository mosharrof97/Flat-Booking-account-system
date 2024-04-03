<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function __construct()
    {
        $this->middleware('permission:list customer', ['only' => ['index']]);
        $this->middleware('permission:create customer', ['only' => ['create','store']]);
        $this->middleware('permission:update customer', ['only' => ['update','edit']]);
        $this->middleware('permission:view customer', ['only' => ['view']]);
        $this->middleware('permission:delete customer', ['only' => ['destroy']]);
    }

    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function view($id){

    }

    public function destroy($id){

    }
}