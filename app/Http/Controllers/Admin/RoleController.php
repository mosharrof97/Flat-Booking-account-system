<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('Admin-Panel.page.Role.Role', compact('roles'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>['required'],
        ]);
        Role::create($request->all());
        return redirect()->route('role.list')->with('success', 'Role add successful.');
    }
}
