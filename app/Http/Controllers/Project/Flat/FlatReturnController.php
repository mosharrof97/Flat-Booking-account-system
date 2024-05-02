<?php

namespace App\Http\Controllers\Project\Flat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Flat;

class FlatReturnController extends Controller
{
    public function index($id){

        $flat = Flat::find($id);
        // return($flat->client);

        return view('Project-Panel.Flat.Flat_return.Return',compact('flat'));

    }
}
