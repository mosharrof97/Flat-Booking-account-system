<?php

namespace App\Http\Controllers\Project\Purchase;

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
    //     $this->middleware('permission:view expanse', ['only' => ['index']]);
    //     $this->middleware('permission:create expanse', ['only' => ['create','store']]);
    //     $this->middleware('permission:show expanse', ['only' => ['show']]);
    //     // $this->middleware('permission:delete', ['only' => ['delete']]);
    // }
    public function index(){
        $projectId = Session::get('project_id');
        if($projectId){
             $purchases = ReturnPurchase::where('project_id',$projectId)->orderBy('id','desc')->paginate(15);

             return view('Project-Panel.Purchase.Purchase_Return.Return_Purchase_List', compact('purchases' ));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create(){
        if(Session::get('project_id')){
            $purchase = Purchase::orderBy('id','desc')->get();

            return view('Project-Panel.Purchase.Purchase_Return.Add_Return_Purchase', compact('purchase'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }



}
