<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;

class ProjectExpenseController extends Controller
{
    public function index(){

    }

    public function create(){

        return view('Project-Panel.Expanse.Add_Expense');
    }

    public function store(Request $request)
{
    $names = $request->input('name');
    $quantities = $request->input('quantity');
    $units = $request->input('unit');
    $prices = $request->input('price');
    $total_prices = $request->input('total_price');

    $expensesData = [
        'project_id' => 1,
        'date' => $request->date,
        'total' => $request->total,
    ];
    foreach ($names as $key => $name) {
        $expensesData[] = [
            'name' => $name,
            'quantity' => $quantities[$key],
            'unit' => $units[$key],
            'price' => $prices[$key],
            'total_price' => $total_prices[$key],
        ];
    }

    // dd($expensesData);


    $expenses = Expense::insert($expensesData);

    return $expenses;
}
    // public function store(Request $request){

    //     // dd($request->all());

    //     $name = [];
    //     foreach($request->input('name') as $key => $value) {
    //         $data =$value;
    //     }
    //     $quantity = [];
    //     foreach($request->input('quantity') as $key => $value) {
    //         $quantity =$value;
    //     }
    //     $unit = [];
    //     foreach($request->input('unit') as $key => $value) {
    //         $unit =$value;
    //     }
    //     $price = [];
    //     foreach($request->input('price') as $key => $value) {
    //         $price =$value;
    //     }

    //     $total_price = [];
    //     foreach($request->input('total_price') as $key => $value) {
    //         $total_price =$value;
    //     }


    //     $request->validate([

    //     ]);

    //     $data = Expense::create([
    //         'project_id'=>1,
    //         'date'=>$request->date,
    //         'name'=>$name,
    //         'quantity'=>$quantity,
    //         'unit'=>$unit,
    //         'price'=>$price,
    //         'total_price'=>$total_price,
    //         'total'=>$request->total,
    //     ]);

    //     return $data;
    //     // return redirect()->route()->with('success','Expense Add Successful.');
    // }
}
