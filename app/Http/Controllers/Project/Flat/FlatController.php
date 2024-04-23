<?php

namespace App\Http\Controllers\Project\Flat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Flat;

class FlatController extends Controller
{
    public function index(){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flats = Flat::where('project_id', $project_id)->where('status', '!=', 1)->get();
            return view('Project-Panel.Flat.Flat_list', compact('flats'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create(){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            return view('Project-Panel.Flat.Flat_add');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function store(Request $request){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $request->validate([
                'name' =>[ 'required'],
                'flat_area' =>[ 'required'],
                'price' =>[ 'required'],
                'room' =>[ 'required'],
                'dining_space' =>[ 'required'],
                'bath_room' =>[ 'required'],
                'description' =>[ 'required'],
                // 'Parking' =>[ 'required'],
                // 'Outdoor' =>[ 'required'],
            ]);

            $data = [
                'project_id' => $project_id,
                'name' => $request->name,
                'flat_area' =>$request->flat_area,
                'price' =>$request->price,//Price/per Sqft
                'room' =>$request->room,
                'dining_space' =>$request->dining_space,
                'bath_room' =>$request->bath_room,
                'description' =>$request->description,
                'Parking' =>$request->Parking,
                'Outdoor' =>$request->Outdoor,
            ];

            Flat::create($data);

            return redirect()->route('flat.list')-> with('success','Flat Create Successful');

        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function edit(){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($id);
            // Flat::where('project_id', $project_id) ->where('status', '!=', 1) ->find($id);
            return view('Project-Panel.Flat.Flat_edit', compact('flat'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function update(Request $request, $id){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $request->validate([
                'name' =>[ 'required'],
                'flat_area' =>[ 'required'],
                'price' =>[ 'required'],
                'room' =>[ 'required'],
                'dining_space' =>[ 'required'],
                'bath_room' =>[ 'required'],
                'description' =>[ 'required'],
                // 'Parking' =>[ 'required'],
                // 'Outdoor' =>[ 'required'],
            ]);

            $data = [
                'project_id' => $project_id,
                'name' => $request->name,
                'flat_area' =>$request->flat_area,
                'price' =>$request->price,//Price/per Sqft
                'room' =>$request->room,
                'dining_space' =>$request->dining_space,
                'bath_room' =>$request->bath_room,
                'description' =>$request->description,
                // 'Parking' =>$request->Parking,
                // 'Outdoor' =>$request->Outdoor,
            ];

            $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($id);
            $flat->update($data);

            return redirect()->route('flat.list')-> with('success','Flat Update Successful');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function view($id){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($id);
            return view('', compact('flat'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function delete($id){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', '!=', 1)->find($id);
            $flat->update([
                'status' => 1,
            ]);
            return redirect()->route('flat.list')-> with('success','Flat Delete Successful');
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
