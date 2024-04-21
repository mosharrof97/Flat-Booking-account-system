<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index(){

        $vendors = Vendor::where('status', 0)->get();
        return view('Admin-Panel.page.Vendor.vendor_list', compact('vendors'));
    }

    public function create(){

        return view('Admin-Panel.page.Vendor.Add_Vendor');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        Vendor::create($data);
        return redirect()->route('vendor.list')->with('message','Create Project Successful');;
    }

    // public function edit($id){

    //     return view('Admin-Panel.page.Vendor.Edit_Vendor');
    // }

    // public function update(){

    // }

    // public function show($id){

    //     $vendor = Vendor::where('id',$id)->first();

    //     return view('Admin-Panel.page.Vendor.show_vendor', compact('vendor'));
    // }

    public function show($id){
        $vendor = Vendor::where('status', 0)->find($id);
        return view('Admin-Panel.page.Vendor.show_vendor', compact('vendor'));
    }

    public function destroy($id){

        $vendor = Vendor::where('status', 0)->findOrFail($id);
        $data = [
            'status' => 1,
        ];

        $vendor->update($data);
        return back()-> with('message', 'Vendor Delete Successful');
    }


}
