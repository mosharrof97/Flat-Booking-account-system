<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Expense;

class ProjectExpenseController extends Controller
{
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
            return view('Project-Panel.Expanse.Add_Expense');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }


    public function store(Request $request)
    {
        $projectId = Session::get('project_id');
         if($projectId){
            $names = $request->input('name');
            $quantities = $request->input('quantity');
            $units = $request->input('unit');
            $prices = $request->input('price');
            $total_prices = $request->input('total_price');


            $expensesData = [
                'project_id' => $projectId,
                'date' => $request->date,
                'total' => $request->total,

                // ---------Use json_encode---------//
                'name' =>json_encode($names),
                'quantity' => json_encode($quantities),
                'unit' =>json_encode( $units),
                'price' => json_encode($prices),
                'total_price' => json_encode($total_prices),
                // ---------Use json_encode---------//
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
    public function view($id){
        $projectId = Session::get('project_id');
        if($projectId){
            $expense = Expense::where('id',$id)->where('project_id',$projectId)->first();

            return view('Project-Panel.Expanse.Expense_View', compact('expense'));
        }else{
        return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
