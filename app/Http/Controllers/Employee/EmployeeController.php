<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view user', ['only' => ['index']]);
    //     $this->middleware('permission:create user', ['only' => ['create','store']]);
    //     $this->middleware('permission:update user', ['only' => ['update','edit']]);
    //     $this->middleware('permission:delete user', ['only' => ['destroy']]);
    // }

    public function index() {
        $users = User::get();
        return view('Admin-Panel.page.Employee.employee_list', ['users' => $users]);
    }

    public function create() {
        $roles = Role::pluck('name','name')->all();
        return view('Admin-Panel.page.Employee.employee', ['roles'  => $roles]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required',
            // 'nid' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            // 'role_id' => 'required',
            // 'image' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            // 'nid' => $request->nid,
            // 'role_id' => $request->role_id,
            'password' => Hash::make($request->password),
            // 'image'=> $imageName,
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('employee.list')->with('status','User created successfully with roles');
    }

    public function edit(User $user) {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        return view('Admin-Panel.page.Employee.employee_edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    public function update(Request $request, User $user) {
        $request->validate([
           'name' => 'required|string|max:255',
           'phone' => 'required',
        //    'nid' => 'required',
           'email' => 'required|email|max:255|unique:users,email',
        //    'password' => 'required|string|min:8|max:20',
        //    'role_id' => 'required',
        //    'image' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            // 'nid' => $request->nid,
            // 'role_id' => $request->role_id,
            // 'password' => Hash::make($request->password),
            // 'image'=> $imageName,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

       return redirect()->route('employee.list')->with('status','User Updated Successfully with roles');
    }

    public function destroy($userId) {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('employee.list')->with('status','User Delete Successfully');
    }
}
