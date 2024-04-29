<?php

namespace App\Http\Controllers\Project\Flat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Flat;
use App\Models\Project;
use App\Models\District;
use App\Models\Client;



class FlatSaleController extends Controller
{
    public function index(){

        $project_id = Session::get('project_id');
        if($project_id !== null){
            $project = Project::find($project_id);
            $flats = Flat::where('project_id', $project_id)->where('status', 0)->get();

            // dd($flats);
            return view('Project-Panel.Flat.Flat_sale', compact(['flats','project']));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function create(Request $request, $id){
        $project_id = Session::get('project_id');
        if($project_id !== null){
            $project = Project::find($project_id);
            $clients = Client::all();
            $flat = Flat::where('project_id', $project_id)->where('status', 0)->find($id);

            $clientInfo = '';
            if($request->client){
                $clientInfo = Client::find($request->client);
                // dd($clientInfo);
            }

            // dd($flat);
            return view('Project-Panel.Flat.Flat_sale_form', compact(['flat','project','clients','clientInfo']));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }


    public function flatBooking( Request $request, $id){

        // dd($request->all());
        $project_id = Session::get('project_id');
        if($project_id !== null){

            // dd($request->all());
            $flats = Flat::where('project_id', $project_id)->where('status', 0)->find($id);

            $flats->update([
                'client_id' => $request->client_id,
                'sale_status' => 1,
            ]);

            // dd($flats);
            // return view('Project-Panel.Flat.Flat_booking_info', compact('flats'));
        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }
}
