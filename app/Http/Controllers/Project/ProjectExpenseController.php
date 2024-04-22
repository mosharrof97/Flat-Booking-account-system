<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Expense;
use App\Models\Vendor;

class ProjectExpenseController extends Controller
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
             $expenses = Expense::where('project_id',$projectId)->get();

             // dd($expenses);
             return view('Project-Panel.Expanse.Expense_List', compact('expenses' ));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create(){
        if(Session::get('project_id')){

            $vendor = Vendor::all();
            // $user = auth()->user()->id;
            return view('Project-Panel.Expanse.Add_Expense', compact('vendor'));
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


            $expensesData = [
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
                'created_by' => auth()->user()->id,

                //--------Use implode Method-------//
                // 'name' =>implode("**",$names),
                // 'quantity' => implode("**",$quantities),
                // 'unit' =>implode( "**",$units),
                // 'price' => implode("**",$prices),
                // 'total_price' => implode("**",$total_prices),
                //--------Use implode Method-------//
            ];

            $expenses = Expense::create($expensesData);
            return redirect()->route('project.expense.list')-> with('success','Expense Add Successful.');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function show($id){
        $projectId = Session::get('project_id');
        if($projectId){
            $expense = Expense::where('id',$id)->where('project_id',$projectId)->first();

            return view('Project-Panel.Expanse.Expense_View', compact('expense'));
        }else{
        return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
