<?php

namespace App\Http\Controllers\Project\Flat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Flat;



class FlatSaleController extends Controller
{
    public function index(){

        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flats = Flat::where('project_id', $project_id)->where('status', 0)->get();

            // dd($flats);
            return view('Project-Panel.Flat.Flat_sale', compact('flats'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create($id){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flat = Flat::where('project_id', $project_id)->where('status', 0)->find($id);

            dd($flat);
            return view('Project-Panel.Flat.Flat_sale_form', compact('flat'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }


    public function update( Request $request, $id){
        $project_id = Session::get('project_id');
        if($project_id !== null){

            $flats = Flat::where('project_id', $project_id)->where('status', 0)->find($id);

            dd($flats);
            // return view('Project-Panel.Flat.Flat_sale', compact('flats'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
