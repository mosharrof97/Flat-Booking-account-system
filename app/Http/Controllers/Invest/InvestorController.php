<?php

namespace App\Http\Controllers\Invest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InvestorRequest;
use App\Models\Investor;

class InvestorController extends Controller
{
    public function index(){
        $datas = Investor::paginate(15);
        return view('Admin-Panel.page.Investment.investorList', compact('datas') );
    }

    public function create(){
        return view('Admin-Panel.page.Investment.create_investor');
    }

    public function store(InvestorRequest $request){
        dd($request->image);
        if($request->hasFile('image')){
            $imageName = 'Investor_'. time() .'_'. mt_rand(100000, 10000000000) .'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('upload/Investor'), $imageName);
        };
// dd($request->hasFile('image'));
        $data=[
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'role'=>'investor',
            'password'=>$request->password,
            'address'=>$request->address,
            'city'=>$request->city,
            'district'=>$request->district,
            'zipCode'=>$request->zipCode,
            'image'=>$imageName
        ];
        Investor::create($data);
        return back()->with('success','Investor Create Successful.');
    }

    public function view($id){
        $data = Investor::where('id',$id)->first();
        return view('Admin-Panel.page.Investment.investor_view', compact('data'));
    }
}
