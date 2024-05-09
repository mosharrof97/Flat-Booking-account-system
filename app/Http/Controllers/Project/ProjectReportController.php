<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\Investment;
use App\Models\InvestInstallment;
use App\Models\Client;
use App\Models\Expense;
use DB;

class ProjectReportController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:project report', ['only' => ['investReport','expenseReport',]]);
    // }

    public function investReport(Request $request)
    {
        $project_id = Session::get('project_id');
        if ($project_id !== null) {
            $client = Client::all();
            $installment = '';

            if ($request->name !== null || ($request->start_date !== null && $request->end_date !== null)) {
                if ($request->start_date == null && $request->end_date == null) {
                    $installment = InvestInstallment::whereHas('investment.client', function ($query) use ($request) {
                        $query->where('clients.id', $request->name);
                    })
                        ->orderBy('id', 'desc')
                        ->paginate(15);
                } elseif($request->name == null){
                    $installment = InvestInstallment::orderBy('id', 'desc')
                        ->when($request->start_date && $request->end_date, function (Builder $builder) use ($request) {
                        $builder->whereBetween(DB::raw('DATE(updated_at)'), [
                            $request->start_date,
                            $request->end_date,
                        ]);
                    })->paginate(15);
                }else {
                    $installment = InvestInstallment::orderBy('id', 'desc')
                        ->whereHas('investment.client', function ($query) use ($request) {
                            $query->where('clients.id', $request->name);
                        })->when($request->start_date && $request->end_date, function (Builder $builder) use ($request) {
                            $builder->whereBetween(DB::raw('DATE(updated_at)'), [
                                $request->start_date,
                                $request->end_date,
                            ]);
                        })->paginate(15);
                }
            } else {
                $installment = InvestInstallment::orderBy('id', 'desc')->paginate(15);
            }

            return view('Project-Panel.Report.Invest_Report', compact('installment', 'client'));
        } else {
            return redirect()->route('list.project')->with('error', 'Project Id Is Null');
        }
    }


    public function expenseReport(Request $request){
        $project_id = Session::get('project_id');
        if ($project_id !== null) {

            $expense = "";
            if ($request->start_date !== null && $request->end_date !== null) {
                $expense = Expense::orderBy('id', 'desc')
                        ->when($request->start_date && $request->end_date, function (Builder $builder) use ($request) {
                        $builder->whereBetween(DB::raw('DATE(date)'), [
                            $request->start_date,
                            $request->end_date,
                        ]);
                    })->paginate(15);
            }else{
                $expense = Expense::orderBy('id','desc')->paginate(15);
            }

            return view('Project-Panel.Report.Expense_Report', compact('expense'));
        } else {
            return redirect()->route('list.project')->with('error', 'Project Id Is Null');
        }
    }
}
