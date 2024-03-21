<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectDashboardController extends Controller
{
    public function index($name, $id){

        $data = [
            'project' => Project::where('id', $id)->first(),
        ];
        return view('Admin-Panel.page.Project.Project-Panel.dashboard', $data);
    }
}
