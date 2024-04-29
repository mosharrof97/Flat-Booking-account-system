<?php

namespace App\Http\Controllers\Project\Flat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Flat;
use App\Models\FlatBookingInfo;

class BookingController extends Controller
{
    public function flatBooking( Request $request, $id){

        $project_id = Session::get('project_id');
        if($project_id !== null){

            $request->validate([
                'client_id' => 'required',
            ]);

            $flat = Flat::where('project_id', $project_id)->where('status', 0)->find($id);

            try {
                DB::beginTransaction();
                $flat->update([
                    'client_id' => $request->client_id,
                    'sale_status' => 1,
                ]);

                $data = [
                    'flat_id'=> $id,
                    'client_id'=> $request->client_id,
                    'buying_price'=> $flat->price * $flat->flat_area,
                    'booking_by'=> auth()->id(),
                ];

                // dd($data['buying_price']);
                $bookingId = FlatBookingInfo::create($data);
                DB::commit();

               return response()->route('booking_view', $flat->id);

            } catch (\Exception $e) {
                DB::rollback();

                return back()->with('error','Investment error: '.$e->getMessage());
            }

        }else{
            return redirect()->route('list.project')-> with('error','Project Id Is Null');
        }
    }

    public function BookingView($id){

        $booking = FlatBookingInfo::where('flat_id',$id)->first();
        return view('Project-Panel.Flat.Flat_booking_info', compact('booking'));
    }
}
