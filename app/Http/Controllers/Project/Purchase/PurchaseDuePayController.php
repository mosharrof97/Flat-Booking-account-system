<?php

namespace App\Http\Controllers\Project\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchaseDuePay;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\ReturnPurchase;
use App\Models\Vendor;


class PurchaseDuePayController extends Controller
{
    public function index(){
        $purchaseDuePay = PurchaseDuePay::orderBy('id','desc')->get();

        return view('', compact('purchaseDuePay'));
    }

    public function create($id){
        $purchase = Purchase::find($id);

        return view('Project-Panel.Purchase.Pay_due', compact('purchase'));
    }

    public function store(Request $request, $id){
        $request->validate([
            'data'=>'required',
            'pay'=>'required',
        ]);
        $data = [
            'date'=>$request->date,
            'purchase_id'=>$id,
            'invoice_no'=>$request->invoice_no,
            'due'=>$request->due,
            'pay'=>$request->pay,
        ];
        $invoice = PurchaseDuePay::create($data);
        dd($invoice);
    }
}
