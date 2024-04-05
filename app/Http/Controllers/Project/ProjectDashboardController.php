<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Session;


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
            $data = [
                'project' => Project::where('id', $project_id)->first(),
            ];
            return view('Project-Panel.dashboard', $data);
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function sessionDelete(Request $request){
       $project_id = Session::get('project_id');
        if($project_id !== null){
            Session::flush('project_id');
            return redirect()->route('list.project');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
