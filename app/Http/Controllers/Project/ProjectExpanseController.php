<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectExpanseController extends Controller
{
    public function index( $id){

        return view('Admin-Panel.page.Project.Project-Panel.Investment.investmentList');
    }
}
