<?php

namespace App\Http\Controllers\Project\Flat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Flat;
use App\Models\FlatReturnInfo;
use App\Models\FlatSaleInfo;
class FlatReturnController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:flat return', ['only' => ['index','flatReturn']]);
    // }

    public function index($id){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($id);

            return view('Project-Panel.Flat.Flat_return.Return',compact('flat'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function flatReturn(Request $request){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $request->validate([
                'flat_id' =>[ 'required'],
                'client_id' =>[ 'required'],
                'buying_price' =>[ 'required'],
                'payable_amount' =>[ 'required'],
                'payment_type' =>[ 'required'],
                'return_amount' =>[ 'required'],
            ]);

            if($request->payment_type == 'bank' || $request->payment_type == 'check'){
                $request->validate([
                    'bank_name' =>[ 'required'],
                    'branch' =>[ 'required'],
                    'account_number' =>[ 'required'],
                ]);
                if($request->payment_type == 'check'){
                    $request->validate([
                        'check_number' =>[ 'required'],
                    ]);
                }
            }
            // dd($request->all());
            try {
                DB::beginTransaction();
                    $data = [
                        'flat_id' =>$request->flat_id,
                        'client_id' =>$request->client_id,
                        'buying_price' =>$request->buying_price,
                        'payable_amount' =>$request->payable_amount,
                        'payment_type' =>$request->payment_type,
                        'return_amount' =>$request->return_amount,

                        // 'bank_name' =>$request->bank_name,
                        // 'branch' =>$request->branch,
                        // 'account_number' =>$request->account_number,
                        // 'check_number' =>$request->check_number,

                        'sold_by' => $request->sold_by,
                    ];
                    FlatReturnInfo::create($data);

                    $saleFlat = FlatSaleInfo::where('flat_id', $request->flat_id)->first();
                    $saleFlat->delete();

                    $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($request->flat_id);
                    $update = $flat->update([
                        'client_id'=> null,
                        'sale_status'=>0,
                    ]);
                    DB::commit();
                    return redirect()->route('flat.view.chart');
                
            } catch (\Exception $e) {
                DB::rollback();

                return back()->with('error','Flat Sale error: '.$e->getMessage());
            }
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }

    }
}
