<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\District;
use App\Models\EmployeeAddress;
use DB;

class EmployeeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:list employee', ['only' => ['index']]);
    //     $this->middleware('permission:create employee', ['only' => ['create','store']]);
    //     $this->middleware('permission:update employee', ['only' => ['update','edit']]);
    //     $this->middleware('permission:view employee', ['only' => ['view']]);
    //     $this->middleware('permission:delete employee', ['only' => ['destroy']]);
    // }

    public function index() {
        $employee = Employee::get();
        return view('Admin-Panel.page.Employee.employee_list', ['employees' => $employee]);
    }

    public function create() {
        // $roles = Role::pluck('name','name')->all();
        $districts = District::get();
        return view('Admin-Panel.page.Employee.employee', ['districts'=>$districts]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'phone' => 'required|max:255|unique:employees,phone',
            'nid' => 'required',
            'email' => 'required|email|max:255|unique:employees,email',
            'designation' => 'required',
            'image' => 'required',

            'pre_address' => 'required|string|max:255',
            'pre_city' => 'required|string|max:255',
            'pre_district' => 'required|string|max:255',
            'pre_zipCode' => 'required',

            'per_address' => 'required|string|max:255',
            'per_city' => 'required|string|max:255',
            'per_district' => 'required|string|max:255',
            'per_zipCode' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = 'Employee_' . time() . '_' . mt_rand(100000, 9999999999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('upload/employee'), $imageName);
        }

        // dd(auth()->id());
        try {
            DB::beginTransaction();
            $employee = Employee::create([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'nid' => $request->nid,
                'designation' => $request->designation,
                'image'=> $imageName ?? 'No Image',
                'created_by' => $request->auth()->id(),
            ]);

            EmployeeAddress::create([
                'employee_id' => $employee->id,
                'pre_address' => $request->pre_address,
                'pre_city' => $request->pre_city,
                'pre_district' => $request->pre_district,
                'pre_zipCode' => $request->pre_zipCode,

                'per_address' => $request->per_address,
                'per_city' => $request->per_city,
                'per_district' => $request->per_district,
                'per_zipCode' => $request->per_zipCode,
            ]);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }



        return redirect()->route('employee.list')->with('status','User created successfully with roles');
    }

    public function edit(Request $request, $id) {
        $districts = District::get();
        $employee = Employee::find($id);

        return view('Admin-Panel.page.Employee.employee_edit', [
            'employee' => $employee,
            'districts' => $districts,
        ]);
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'phone' => 'required|max:255|unique:employees,phone',
            'nid' => 'required',
            'email' => 'required|email|max:255|unique:employees,email',
            'designation' => 'required',
            'image' => 'required',

            'pre_address' => 'required|string|max:255',
            'pre_city' => 'required|string|max:255',
            'pre_district' => 'required|string|max:255',
            'pre_zipCode' => 'required',

            'per_address' => 'required|string|max:255',
            'per_city' => 'required|string|max:255',
            'per_district' => 'required|string|max:255',
            'per_zipCode' => 'required',
        ]);

        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     // 'nid' => $request->nid,
        //     // 'role_id' => $request->role_id,
        //     // 'password' => Hash::make($request->password),
        //     // 'image'=> $imageName,
        // ];



        try {
            DB::beginTransaction();
            $employee = Employee::update([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'nid' => $request->nid,
                'designation' => $request->designation,
                'image'=> $imageName ?? 'No Image',
                'updated_by' => $request->auth()->id(),
            ]);

            EmployeeAddress::update([
                'employee_id' => $employee->id,
                'pre_address' => $request->pre_address,
                'pre_city' => $request->pre_city,
                'pre_district' => $request->pre_district,
                'pre_zipCode' => $request->pre_zipCode,

                'per_address' => $request->per_address,
                'per_city' => $request->per_city,
                'per_district' => $request->per_district,
                'per_zipCode' => $request->per_zipCode,
            ]);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

       return redirect()->route('employee.list')->with('status','User Updated Successfully with roles');
    }

    public function view($Id) {
        $employee = Employee::find($Id);

        return view('Admin-Panel.page.Employee.employee_details',['employee' => $employee]);
    }

    public function destroy($employeeId) {

        $employee = Employee::findOrFail($employeeId);
        // $employee->deleted_by = auth()->id();
        // $employee->save();

        $employee->delete();

        return redirect()->route('employee.list')->with('status','User Delete Successfully');
    }
}
