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
use App\Models\Installment;




class FlatSaleController extends Controller
{
    public function index(){

        $project_id = Session::get('project_id');
        if($project_id !== null){
            $project = Project::find($project_id);
            $flats = Flat::where('project_id', $project_id)->where('status', 0)->get();

            // dd($flats);
            return view('Project-Panel.Flat.Flat_sale', compact(['flats','project']));
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

            $clientInfo = '';
            if($request->client){
                $clientInfo = Client::find($request->client);
                // dd($clientInfo);
            }

            // dd($flat);
            return view('Project-Panel.Flat.Flat_sale_form', compact(['flat','project','clients','clientInfo']));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }


    // public function ( Request $request, $id){

    // }

    public function flatSale( Request $request, $id){

        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', 0)->find($id);
            // dd($request->all());
            try {
                DB::beginTransaction();
                $flat->update([
                    'client_id' => $request->client_id,
                    'sale_status' => 2,
                ]);

                $flatSaleInfo = FlatSaleInfo::create([
                    'flat_id' => $id,
                    'price'=> $request->total_Investment,
                    'sold_by' => auth()->id(),
                ]);

                $installment = Installment::create([
                    'flatSale_id' => $flatSaleInfo,
                    'payment_type' => $request->payment_type,
                    'amount' => $request->amount,
                    'bank_name'=> $request->bank_name,
                    'branch'=> $request->branch,
                    'account_number'=> $request->account_number,
                    'check_number'=> $request->check_number,
                    'created_by'=> auth()->id(),
                ]);


                DB::commit();
                dd($installment);
                return view('Project-Panel.Flat.Payment', compact('installment'));
            } catch (\Exception $e) {
                DB::rollback();

                return back()->with('error','Flat Sale error: '.$e->getMessage());
            }
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
