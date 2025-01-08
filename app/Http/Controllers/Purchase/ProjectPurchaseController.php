<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\Vendor;
use App\Models\PurchaseDuePay;
use App\Models\ReturnPurchase;
use App\Models\ComponyInfo;
use App\Models\VendorPay;

class ProjectPurchaseController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:list purchase', ['only' => ['index']]);
    //     $this->middleware('permission:create purchase', ['only' => ['create','store']]);
    //     $this->middleware('permission:show purchase', ['only' => ['show']]);
    // }
    public function index(){       
        $purchases = Purchase::orderBy('id', 'desc')->paginate(10);
        return view('Admin-Panel.page.Purchase.Purchase_List', compact('purchases' ));        
    }

    public function create(){       
        $vendor = Vendor::all();
        return view('Admin-Panel.page.Purchase.Add_Purchase', compact('vendor'));        
    }


    public function store(Request $request)
    {
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

            $lastInvoice = Purchase::orderBy('id', 'desc')->first();
            $invoiceNumber = $lastInvoice ? ++$lastInvoice->invoice_no : 1;

            try {
                DB::beginTransaction();
                $purchasesData = [
                    'vendor_id' => $request->vendor_id,
                    'memo_no' => $request->memo_no,
                    'date' => $request->date,
                    'invoice_no'=> 10000 + $invoiceNumber,

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
                    'payable_amount' => $request->payable_amount,
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
                $purchases = Purchase::create($purchasesData);

                //========== Vendor pay  ============//
                $vendor = Vendor::find($request->vendor_id);
                $vendorData = [
                    'payable_amount' => $vendor->payable_amount + $request->payable_amount,
                    'paid' => $vendor->paid + $request->paid,
                    'due' => $vendor->due + $request->due,
                ];
                
                
                // $vendorPay = [
                //     'date'=>$request->date,
                //     'vendor_id'=>$request->vendor_id,
                //     'pay'=>$request->paid,
                //     'due' => $vendor->due + $request->due,
                //     'created_by'=>auth()->id(),
                // ];
                // VendorPay::create($vendorPay);
                
                $vendor->update($vendorData);
                
                //========== Vendor Pay  ============//

                //========== Purchase Due Pay Table ============//
                $data = [
                    'date'=>$request->date,
                    'purchase_id'=>$purchases->id,
                    'invoice_no'=>$purchases->invoice_no,
                    'due'=>$request->due,
                    'pay'=>$request->paid,
                    'created_by'=>auth()->id(),
                ];
                PurchaseDuePay::create($data);
                //========== Purchase Due Pay Table ============//

                DB::commit();

                return redirect()->route('project.purchase.list')-> with('success','Purchase Add Successful.');
            }catch (\Exception $e) {
                DB::rollback();

                return back()->with('error','Purchase error: '.$e->getMessage());
            }
        
    }

    public function show($id){        
        $comInfo =ComponyInfo::first();
        $purchase = Purchase::where('id',$id)->first();
        $duePay = PurchaseDuePay::all();

        // return $duePay;

        return view('Admin-Panel.page.Purchase.Purchase_View', compact('purchase','duePay','comInfo'));        
    }

    public function destroy($id){
        $purchase = Purchase::findOrFail($id);
        $duePay = PurchaseDuePay::where('purchase_id',$purchase->id)->get();
        $vendor = Vendor::findOrFail($purchase->vendor_id);
        $vendorData = [
            'payable_amount' => $vendor->payable_amount - $purchase->payable_amount,
            'paid' => $vendor->paid - $purchase->paid,
            'due' => $vendor->due - $purchase->due,
        ];
        $vendor->update($vendorData);
        $purchase->delete();
        foreach ($duePay as $key => $value) {
            $value->delete();
        }
        return back()-> with('message', 'Purchase Delete Successful');
    }

    public function restore($id) {
        $purchase = Purchase::withTrashed()->findOrFail($id);
        $purchase->restore();

        return redirect()->route('Purchase.list')->with('message','Purchase Restore Successfully');
    }
}
