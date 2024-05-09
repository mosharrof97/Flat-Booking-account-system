<?php

namespace App\Http\Controllers\Project\Flat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Flat;
use App\Models\Project;
use App\Models\District;
use App\Models\Client;
use App\Models\FlatSaleInfo;
use App\Models\Payment;
use App\Models\ComponyInfo;




class FlatSaleController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:flat sale', ['only' => ['index','create','flatSale','flatSaleDetails','payment','paymentStore']]);
    // }

    public function index(){

        $project_id = Session::get('project_id');
        if($project_id !== null){
            $comInfo = ComponyInfo::first();
            $project = Project::find($project_id);
            $flats = Flat::where('project_id', $project_id)->where('status', 0)->get();

            return view('Project-Panel.Flat.Flat_sale', compact(['flats','project','comInfo']));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create(Request $request, $id){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $project = Project::find($project_id);
            $clients = Client::all();
            $flat = Flat::where('project_id', $project_id)->where('status', 0)->find($id);
            $comInfo = ComponyInfo::first();

            $clientInfo = '';
            if($request->client){
                $clientInfo = Client::find($request->client);
            }
            return view('Project-Panel.Flat.Flat_sale_form', compact(['flat','project','clients','clientInfo','comInfo']));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function flatSale( Request $request, $id){

        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', 0)->find($id);
            try {
                DB::beginTransaction();
                $flat->update([
                    'client_id' => $request->client_id,
                    'sale_status' => 2,
                ]);

                $flatSaleInfo = FlatSaleInfo::create([
                    'flat_id' => $flat->id,
                    'price'=> $request->total_Investment,
                    'sold_by' => auth()->id(),
                ]);

                $data = [
                    'flat_id' => $flat->id,
                    'flatSale_id' => $flatSaleInfo->id,
                    'payment_type' => $request->payment_type,
                    'amount' => $request->amount,
                    'bank_name'=> $request->bank_name,
                    'branch'=> $request->branch,
                    'account_number'=> $request->account_number,
                    'check_number'=> $request->check_number,
                    'received_by'=> auth()->id(),
                ];


                $payment = Payment::create($data);
                DB::commit();

                $comInfo = ComponyInfo::first();
                $flatSale = FlatSaleInfo::find($flatSaleInfo->id);

                return view('Project-Panel.Flat.invoice', compact(['payment','flatSale','comInfo']));
            } catch (\Exception $e) {
                DB::rollback();

                return back()->with('error','Flat Sale error: '.$e->getMessage());
            }
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function flatSaleDetails($id){

        $project_id = Session::get('project_id');
        if($project_id !== null){
            $comInfo = ComponyInfo::first();
            $flat = Flat::find($id);
            if($flat->sale_status == 2){
                // dd($flat->flatSaleInfo);
                $payments = Payment::where('flat_id',$flat->id)->get();

                return view('Project-Panel.Flat.Flat_sale_details', compact(['flat','payments','comInfo']));
            }else{

                return redirect()->route('flat.view.chart');
            }
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }


    public function payment($id){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $flatSaleInfo = FlatSaleInfo::where('flat_id',$id)->first();
            $comInfo = ComponyInfo::first();
            return view('Project-Panel.Flat.payment', compact('flatSaleInfo','comInfo'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function paymentStore(Request $request){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flatSaleInfo = FlatSaleInfo::find($request->flatSaleInfo_id);
            $data = [
                'flat_id'=> $flatSaleInfo->flat->id,
                'flatSale_id'=> $flatSaleInfo->id,
                'payment_type'=> $request->payment_type,
                'amount'=> $request->amount,
                'bank_name'=> $request->bank_name,
                'branch'=> $request->branch,
                'account_number'=> $request->account_number,
                'check_number'=> $request->check_number,
                'received_by'=>auth()->id(),
            ];
        $payment = Payment::create($data);
        $comInfo = CompanyInfo::first();
        $flatSale = FlatSaleInfo::find($flatSaleInfo->id);
            return view('Project-Panel.Flat.invoice', compact(['payment','flatSale','comInfo']));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
