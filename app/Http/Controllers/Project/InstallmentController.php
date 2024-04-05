<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\InvestInstallment;
use App\Models\Investment;

class InstallmentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:installment', ['only' => ['create','store']]);
    // }

    public function create(Request $request,$id){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $investment = Investment::where('project_id', $project_id)->where('id',$id)->first();
            if($investment){
                $data =[
                    'investment'=> $investment,
                    'installment'=> InvestInstallment::where('investment_id', $investment->id)->get(),
                ];
            }
            return view('Project-Panel.Investment.Installment.create_installment',$data);
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function store(Request $request){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $request->validate([
                'investment_id'=> 'required',
                'installment_amount'=> 'required',
            ]);

            $InvestInstallment = [
                'investment_id'=> $request->investment_id,
                'installment_amount'=> $request->installment_amount,
            ];
            // dd($InvestInstallment);
            InvestInstallment::create($InvestInstallment);

            return redirect()->route('project.investment.view',$request->investment_id)->with('success','Investment Successful');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
