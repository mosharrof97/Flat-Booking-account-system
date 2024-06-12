<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Project;
use App\Models\Flat;
use App\Models\Purchase;
use App\Models\Expense;


class ProjectDashboardController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:login project', ['only' => ['index']]);
    //     $this->middleware('permission:logout project', ['only' => ['sessionDelete']]);
    // }

    public function index(Request $request,$id){

        $request->session()->put('project_id',$id);
        $sessiondata = $request->session()->get('project_id');

       $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', 0 );
            $purchase = Purchase::where('project_id', $project_id)->get();
            $data = [
                'project' => Project::where('id', $project_id)->first(),
                'allFlat' => $flat->get()->count(),
                'under_contraction_flat' => $flat->where('active_status', 0 )->get()->count(),
                'complete_flat' => $flat->where('active_status', 0 )->get()->count(),
                'unsold_flat' => $flat->where('sale_status', 0 )->get()->count(),
                'sold_flat' => $flat->where('sale_status', 2 )->get()->count(),
                'totalPurchase' => $purchase->sum('total_amount'),
                'paidPurchase' => $purchase->sum('paid'),
                'duePurchase' => $purchase->sum('due'),
            ];



            dd($data['sold_flat']);
            return view('Project-Panel.dashboard', $data);
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function sessionDelete(Request $request){
       $project_id = Session::get('project_id');
        if($project_id !== null){
            // Session::flush($project_id);
            Session::forget('project_id');
            return redirect()->route('list.project');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
