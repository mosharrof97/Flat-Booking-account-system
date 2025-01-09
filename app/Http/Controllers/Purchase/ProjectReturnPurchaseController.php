<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Purchase;
use App\Models\ReturnPurchase;
use App\Models\Vendor;


class ProjectReturnPurchaseController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:list return purchase', ['only' => ['index','create','store','show']]);
    //    // $this->middleware('permission:create return purchase', ['only' => ['create','store']]);
    //    // $this->middleware('permission:show return purchase', ['only' => ['show']]);
    // }
    public function index(){
        $purchases = ReturnPurchase::orderBy('id','desc')->paginate(15);

        return view('Admin-Panel.page.Purchase.Purchase_Return.Return_Purchase_List', compact('purchases' ));        
    }

    public function create(){
        $purchase = Purchase::orderBy('id','desc')->get();

        return view('Admin-Panel.page.Purchase.Purchase_Return.Add_Return_Purchase', compact('purchase'));        
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ]);

        $names = $request->input('name');
        $quantities = $request->input('quantity');
        $units = $request->input('unit');
        $prices = $request->input('price');
        $total_prices = $request->input('total_price');

        $purchase = Purchase::orderBy('id', 'desc')->first();
        $lastInvoice = ReturnPurchase::orderBy('id', 'desc')->first();
        $invoiceNumber = $lastInvoice ? ++$lastInvoice->id : 1;

        $purchasesData = [
            'vendor_id' => $purchase->vendor_id,
            'memo_no' => $purchase->memo_no,
            'date' => $request->date,
            'purchase_id'=> $request->purchase_id,
            'invoice_no'=> $invoiceNumber + 10000,
            // ---------Use json_encode---------//
            'name' =>json_encode($names),
            'quantity' => json_encode($quantities),
            'unit' =>json_encode( $units),
            'price' => json_encode($prices),
            'total_price' => json_encode($total_prices),
            // ---------Use json_encode---------//

            'total' => $request->total,
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
        $purchases = ReturnPurchase::create($purchasesData);
        $vendor = Vendor::find($purchase->vendor_id);

        $vendor->update([
            'due' => $vendor->due - $request->due,
        ]);
        return redirect()->route('project.return.purchase.list')-> with('success','Purchase Add Successful.');        
    }

    public function show($id){        
        $purchase = ReturnPurchase::where('id',$id)->first();

        return view('Admin-Panel.page.Purchase.Purchase_Return.Return_Purchase_View', compact('purchase'));
        
    }
}
