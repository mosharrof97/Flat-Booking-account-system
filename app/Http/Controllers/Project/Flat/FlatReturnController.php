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
    public function index($id){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($id);

        // return($flat->flatSaleInfo[0]->sold_by);
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
            // dd($request->all());
            try {
                DB::beginTransaction();
                    $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($request->flat_id);
                    $data = [
                        'flat_id' =>$request->flat_id,
                        'client_id' =>$request->client_id,
                        'buying_price' =>$request->buying_price,
                        'payable_amount' =>$request->payable_amount,
                        'payment_type' =>$request->payment_type,
                        'return_amount' =>$request->return_amount,
                        'sold_by' => $request->sold_by,
                    ];

                    FlatReturnInfo::create($data);

                    $saleFlat = FlatSaleInfo::where('flat_id', $request->flat_id)->first();
                    $saleFlat->delete();

                    // Flat::where()
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();

                return back()->with('error','Flat Sale error: '.$e->getMessage());
            }
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }

    }
}
