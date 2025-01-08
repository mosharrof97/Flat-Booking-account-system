<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\PurchaseDuePay;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\ReturnPurchase;
use App\Models\Vendor;
use App\Models\ComponyInfo;


class PurchaseDuePayController extends Controller
{
    public function index(){
        $purchaseDuePay = PurchaseDuePay::orderBy('id','desc')->get();

        return view('', compact('purchaseDuePay'));        
    }

    public function create($id){
        $purchase = Purchase::find($id);

        return view('Admin-Panel.page.Purchase.Due_pay.Pay_due', compact('purchase'));        
    }

    public function store(Request $request, $id){
        $request->validate([
            'date'=>'required',
            'pay'=>'required',
        ]);
        try {
            DB::beginTransaction();
            $data = [
                'date'=>$request->date,
                'purchase_id'=>$id,
                'invoice_no'=>$request->invoice_no,
                'due'=>$request->due,
                'pay'=>$request->pay,
                'created_by'=>auth()->id(),
            ];

            $purchaseDuePay = PurchaseDuePay::create($data);

            $purchase=Purchase::find($id);

            $update=[
                'paid' => $purchase->paid + $purchaseDuePay->pay,
                'due' => $purchaseDuePay->due,
            ];
            $purchase->update($update);
            // dd($update);
            DB::commit();

            return redirect()->route('project.purchase.invoice',$purchaseDuePay->id);
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with('error','Due Pay error: '.$e->getMessage());
        }        
    }

    public function invoice($id){
        $comInfo =ComponyInfo::first();
        $invoice = PurchaseDuePay::find($id);

        return view('Admin-Panel.page.Purchase.Due_pay.invoice',compact('comInfo','invoice'));       
    }
}
