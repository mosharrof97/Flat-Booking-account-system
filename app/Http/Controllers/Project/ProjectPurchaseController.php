<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\Vendor;

class ProjectPurchaseController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:view expanse', ['only' => ['index']]);
    //     $this->middleware('permission:create expanse', ['only' => ['create','store']]);
    //     $this->middleware('permission:show expanse', ['only' => ['show']]);
    //     // $this->middleware('permission:delete', ['only' => ['delete']]);
    // }
    public function index(){
        $projectId = Session::get('project_id');
        if($projectId){
             $purchases = Purchase::where('project_id',$projectId)->paginate(15);

             // dd($purchases);
             return view('Project-Panel.Purchase.Purchase_List', compact('purchases' ));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create(){
        if(Session::get('project_id')){

            $vendor = Vendor::all();
            // $user = auth()->user()->id;
            return view('Project-Panel.Purchase.Add_Purchase', compact('vendor'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }


    public function store(Request $request)
    {
        $projectId = Session::get('project_id');
         if($projectId){
            $request->validate([
                'vendor_id' => 'required',
                'memo_no' => 'required',
                'date' => 'required',
            ]);

            // dd($request->all());

            $names = $request->input('name');
            $quantities = $request->input('quantity');
            $units = $request->input('unit');
            $prices = $request->input('price');
            $total_prices = $request->input('total_price');

            // dd(auth()->id());
            $purchasesData = [
                'project_id' => $projectId,
                // 'user_id' =>  auth()->user()->id,
                'vendor_id' => $request->vendor_id,
                'memo_no' => $request->memo_no,
                'date' => $request->date,
                // ---------Use json_encode---------//
                'name' =>json_encode($names),
                'quantity' => json_encode($quantities),
                'unit' =>json_encode( $units),
                'price' => json_encode($prices),
                'total_price' => json_encode($total_prices),
                // ---------Use json_encode---------//

                'total' => $request->total,
                'service_charge' => $request->service_charge,
                'shipping_charge' => $request->shipping_charge,
                'total_amount' => $request->total_amount,
                'discount' => $request->discount,
                'paid' => $request->paid,
                'due' => $request->due,
                'created_by' => auth()->id(),

                //--------Use implode Method-------//
                // 'name' =>implode("**",$names),
                // 'quantity' => implode("**",$quantities),
                // 'unit' =>implode( "**",$units),
                // 'price' => implode("**",$prices),
                // 'total_price' => implode("**",$total_prices),
                //--------Use implode Method-------//
            ];
            // dd($expensesData);
            $Purchases = Purchase::create($purchasesData);
            return redirect()->route('project.purchase.list')-> with('success','Purchase Add Successful.');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function show($id){
        $projectId = Session::get('project_id');
        if($projectId){
            $purchase = Purchase::where('project_id',$projectId)->where('id',$id)->first();

            return view('Project-Panel.Purchase.Purchase_View', compact('purchase'));
        }else{
        return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
