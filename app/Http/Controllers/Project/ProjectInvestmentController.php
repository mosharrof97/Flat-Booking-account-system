<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectInvestmentController extends Controller
{
    public function index(){

        return view('Admin-Panel.page.Project.Project-Panel.Investment.investmentList');
    }
}
