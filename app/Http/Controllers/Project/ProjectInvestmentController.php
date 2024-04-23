<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Investment;
use App\Models\InvestInstallment;
use App\Models\Investor;


class ProjectInvestmentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:view investment', ['only' => ['index']]);
    //     $this->middleware('permission:create investment', ['only' => ['create','store']]);
    //     $this->middleware('permission:show investment', ['only' => ['show']]);
    // }

    public function index(){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $data = [
                'invest' => Investment::where('project_id',$project_id)->get(),
            ];
            return view('Project-Panel.Investment.investmentList',$data);
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create(Request $request){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $data =[
                'investors'=> Investor::get(),
                ];
            return view('Project-Panel.Investment.create_investment',$data);
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function store(Request $request){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $request->validate([
                'total_Investment'=> 'required',
                'installment_type'=> 'required',
                'profit_type'=> 'required',
                'profit'=> 'required',
                'installment_amount'=> 'required',
            ]);

            try {
                DB::beginTransaction();

                $data=[
                    'investor_id' => $request->investor_id,
                    'project_id'=> $project_id,
                    'total_Investment'=> $request->total_Investment,
                    'installment_type'=> $request->installment_type,
                    'profit_type'=> $request->profit_type,
                    'profit'=> $request->profit,
                ];

                $investmentId = Investment::create($data)->id;
                // dd($investmentId);
                $InvestInstallment = [
                    'investment_id'=> $investmentId,
                    'installment_amount'=> $request->installment_amount,
                ];
                // dd($InvestInstallment);
                InvestInstallment::create($InvestInstallment);

                DB::commit();

            } catch (\Exception $e) {
                DB::rollback();

                return back()->with('error','Investment error: '.$e->getMessage());
                // Optionally, handle the exception
            }

            return redirect()->route('project.investment.list')->with('success','Investment Successful');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function show($id){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $investment = Investment::where('project_id', $project_id)->where('id',$id)->first();
            // dd($investment);
            if($investment){
                $data =[
                    'investment'=> $investment,
                    'installment'=> InvestInstallment::where('investment_id', $investment->id)->get(),
                ];

                return view('Project-Panel.Investment.investment_view', $data);
            } else {
                return back()->with('error', 'No investment Data found for this project.');
            }
        } else {
            return redirect()->route('list.project')->with('error', 'Project Id Is Null');
        }
    }


}
