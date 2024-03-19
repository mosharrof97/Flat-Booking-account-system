<?php

namespace App\Http\Controllers\Invest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Investor;
use App\Models\District;
use App\Models\Project;


class InvestmentController extends Controller
{
    public function index(){

        $datas = Investment::paginate(15);
        return view('Admin-Panel.page.Investment.investmentList', compact('datas'));
    }

    public function create(){
        $data = [
            'investors' => Investor::get(),
            'districts' => District::get(),
            // 'projects'=> Project::get(),
        ];
        return view('Admin-Panel.page.Investment.create_investment', $data);
    }

    public function store(){

        return back();
    }

    public function view(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function delete(){

    }
}
