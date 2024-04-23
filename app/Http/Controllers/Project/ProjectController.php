<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investor;
use App\Models\District;
use App\Models\Project;


class ProjectController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission:view project', ['only' => ['index']]);
    //     $this->middleware('permission:create project', ['only' => ['create','store']]);
    //     $this->middleware('permission:update project', ['only' => ['edit','update']]);
    //     $this->middleware('permission:delete project', ['only' => ['delete']]);
    // }


    public function index(){
        $projects = Project::where('active_status',0)->paginate(15);
        return view('Admin-Panel.page.Project.Project_List',compact('projects'));
    }

    public function create(Request $request){
        $districts = District::get();
        return view('Admin-Panel.page.Project.New_project', compact('districts'));
    }

    // public function projectCreateAPI(){

    // }

    public function store(Request $request){
        $test = $request->validate([
            'projectName' =>[ 'required','string'],
            'budget' =>[ 'required'],
            'land_area' =>[ 'required'],
            'front_road'=>[ 'required'],
            'duration' =>[ 'required'],
            'floor' =>[ 'required'],
            'flat' =>[ 'required'],
            'comm_space_size' =>[ 'required'],
            'num_of_basement' =>[ 'required'],
            'start_date' =>[ 'required'],
            'end_date' =>[ 'required'],
            'address' =>[ 'required','string'],
            'city' =>[ 'required','string'],
            'district_id' =>[ 'required'],
            'zipCode' =>[ 'required'],
            'image' =>[ 'required','image'],
        ]);

        // dd($request->all());

        if($request->hasFile('image')){
            $imageName = 'Project_' . time().'-'.mt_rand(1000000,10000000000).'.'.$request->file('image')->extension();
            $request->image->move(public_path('upload/Project'), $imageName);
        }
        // dd( $imageName);

        $data=[
            'projectName' =>$request->projectName,
            'budget' =>$request->budget,
            'land_area' =>$request->land_area,
            'front_road' =>$request->front_road,
            'duration' =>$request->duration,
            'floor' =>$request->floor,
            'flat' =>$request->flat,
            'comm_space_size' =>$request->comm_space_size,
            'num_of_basement' =>$request->num_of_basement,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'address' =>$request->address,
            'city' =>$request->city,
            'district_id' =>$request->district_id,
            'zipCode' =>$request->zipCode,
            'image' =>$imageName ?? 'No Image',
        ];

        // dd($data);

        Project::create($data);
        return redirect()->route('list.project')->with('message','Create Project Successful');
    }

    public function view($id){
        $project = Project::where('active_status',0)->where('id', $id)->first();
        return view('Admin-Panel.page.Project.Project_View', compact('project'));
    }

    public function edit($id){
        $data=[
            'project' => Project::where('active_status',0)->where('id', $id)->first(),
            'districts' => District::get(),
        ];
        return view('Admin-Panel.page.Project.edit_project', $data);
    }

    public function update(Request $request, $id){

        $request->validate([
            'projectName' =>[ 'required','string'],
            'budget' =>[ 'required'],
            'land_area' =>[ 'required'],
            'front_road' =>[ 'required'],
            'duration' =>[ 'required'],
            'floor' =>[ 'required'],
            'flat' =>[ 'required'],
            'comm_space_size' =>[ 'required'],
            'num_of_basement' =>[ 'required'],
            'start_date' =>[ 'required'],
            'end_date' =>[ 'required'],
            'address' =>[ 'required','string'],
            'city' =>[ 'required','string'],
            'district_id' =>[ 'required'],
            'zipCode' =>[ 'required'],
            'status' =>[ 'required'],
            // 'image' =>[ 'required'],
        ]);

        // if($request->hasFile('image')){
        //     $imageName = 'Project_' . time().'-'.mt_rand(1000000,10000000000).'.'.$request->image->extension();
        //     $request->image->move(public_path('upload/Project'), $imageName);

        //     // $request->file('image')->move(public_path('upload/Investor'), $imageName);
        // }

        $data=[
            'projectName' =>$request->projectName,
            'budget' =>$request->budget,
            'land_area' =>$request->land_area,
            'front_road' =>$request->front_road,
            'duration' =>$request->duration,
            'floor' =>$request->floor,
            'flat' =>$request->flat,
            'comm_space_size' =>$request->comm_space_size,
            'num_of_basement' =>$request->num_of_basement,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'address' =>$request->address,
            'city' =>$request->city,
            'district_id' =>$request->district_id,
            'zipCode' =>$request->zipCode,
            'status' =>$request->status,
            // 'image' =>$imageName,
        ];

        $project = Project::where('active_status',0)->find($id);
        $project->update($data);
        return redirect()->route('list.project')->with('message','Project Update Successful');
    }

    public function delete($id){
        $project = Project::where('active_status',0)->find($id);
        $project->update([
            'active_status' => 1,
        ]);

        return redirect()->route('list.project')->with('message','Project Delete Successful');
    }
}
