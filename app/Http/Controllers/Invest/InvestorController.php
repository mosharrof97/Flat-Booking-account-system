<?php

namespace App\Http\Controllers\Invest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InvestorRequest;
use App\Models\Investor;
use App\Models\District;

class InvestorController extends Controller
{
    public function __construct(){
        $this->middleware('permission:view investor', ['only' => ['index']]);
        $this->middleware('permission:create investor', ['only' => ['create','store']]);
        $this->middleware('permission:show investor', ['only' => ['view']]);
        // $this->middleware('permission:delete investor', ['only' => ['delete']]);
    }
    public function index(){
        //  $datas = Investor::join('districts as per_districts', 'investors.per_district', '=', 'per_districts.id')
        // ->select('investors.*', 'per_districts.name as per_district_name')
        // ->join('districts as pre_districts', 'investors.pre_district', '=', 'pre_districts.id')
        // ->select('investors.*', 'pre_districts.name as pre_district_name')
        // ->paginate(15);
        $datas = Investor::paginate(15);
        return view('Admin-Panel.page.Investment.investorList', compact('datas') );
    }

    public function create(){
        $districts = District::all();
        return view('Admin-Panel.page.Investment.create_investor', compact('districts'));
    }

    public function store(InvestorRequest $request){
        // dd($request->all());
        if($request->hasFile('image')){
            $imageName = 'Investor_'. time() .'_'. mt_rand(100000, 10000000000) .'.'.$request->file('image')->extension();
        };
        // dd($request->hasFile('image'));
        $data=[
            'name'=>$request->name,
            'father_name'=>$request->father_name,
            'mother_name'=>$request->mother_name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'nid'=>$request->nid,
            'tin'=>$request->tin,
            'password'=>$request->password,
            'pre_address'=>$request->pre_address,
            'pre_city'=>$request->pre_city,
            'pre_district'=>$request->pre_district,
            'pre_zipCode'=>$request->pre_zipCode,

            'per_address'=>$request->per_address,
            'per_city'=>$request->per_city,
            'per_district'=>$request->per_district,
            'per_zipCode'=>$request->per_zipCode,
            'role_id'=>4,
            'image'=>$imageName,
        ];

        Investor::create($data);
        $request->file('image')->move(public_path('upload/Investor'), $imageName);

        return back()->with('success','Investor Create Successful.');
    }

    public function view($id){
        $data = Investor::where('id',$id)->first();
        return view('Admin-Panel.page.Investment.investor_view', compact('data'));
    }
}
