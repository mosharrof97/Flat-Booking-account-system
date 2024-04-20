<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;
use App\Models\District;
use App\Models\ClientAddress;
use DB;

class ClientController extends Controller
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
        $client = Client::get();
        return view('Admin-Panel.page.Client.client_list', ['clients' => $client]);
    }

    public function create() {
        // $roles = Role::pluck('name','name')->all();
        $districts = District::get();
        return view('Admin-Panel.page.Client.client', ['districts'=>$districts]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'phone' => 'required|max:255|unique:clients,phone',
            'nid' => 'required|max:20|unique:clients,nid',
            'tin' => 'required|max:20|unique:clients,tin',
            'email' => 'required|email|max:255|unique:clients,email',
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

        // dd($request->all());


        if ($request->hasFile('image')) {
            $imageName = 'Client_' . time() . '_' . mt_rand(100000, 9999999999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('upload/client'), $imageName);
        }

        // dd(auth()->id());
        try {
            DB::beginTransaction();
            $client= Client::create([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'nid' => $request->nid,
                'tin' => $request->nid,
                'password' => 123456789,
                'image'=> $imageName ?? 'No Image',
                'created_by' => auth()->id(),
            ]);

            // dd($client->id);
            $data = ClientAddress::create([
                'client_id' => $client->id,
                'pre_address' => $request->pre_address,
                'pre_city' => $request->pre_city,
                'pre_district' => $request->pre_district,
                'pre_zipCode' => $request->pre_zipCode,

                'per_address' => $request->per_address,
                'per_city' => $request->per_city,
                'per_district' => $request->per_district,
                'per_zipCode' => $request->per_zipCode,
            ]);

            // dd($data);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }



        return redirect()->route('client.list')->with('status','Client created successfully with roles');
    }

    public function edit(Request $request, $id) {
        $districts = District::get();
        $employee = Client::find($id);

        return view('Admin-Panel.page.Client.client_edit', [
            'client' => $client,
            'districts' => $districts,
        ]);
    }

    public function update(Request $request, Client $client) {
        $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'phone' => 'required|max:255|unique:employees,phone',
            'email' => 'required|email|max:255|unique:employees,email',
            'nid' => 'required',
            'tin' => 'required',
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
            $client = Client::update([
                'name' => $request->name,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'nid' => $request->nid,
                'tin' => $request->tin,
                'password'=> 123456789,
                'image'=> $imageName ?? 'No Image',
                'updated_by' => $request->auth()->id(),
            ]);

            ClientAddress::update([
                'client_id' => $client->id,
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
        $client = Client::find($Id);

        return view('Admin-Panel.page.Client.client_details',['client' => $client]);
    }

    public function destroy($id) {

        $client = Client::findOrFail($id);
        // $employee->deleted_by = auth()->id();
        // $employee->save();

        $client->delete();

        return redirect()->route('client.list')->with('status','Client Delete Successfully');
    }
}
