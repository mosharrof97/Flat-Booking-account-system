<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\InvestInstallment;

class ProjectReportController extends Controller
{
    public function investReport(Request $request){
        $installment = InvestInstallment::paginate(15);

        return view('Project-Panel.Report.Invest_Report',compact('installment'));
    }
}
