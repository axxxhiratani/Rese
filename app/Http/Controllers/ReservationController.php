<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;



class ReservationController extends Controller
{
    //
    public function store(Request $request)
    {
        Reservation::create([
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
            "visited_on" =>$request->date." ".$request->time,
            "number_of_people" => $request->number_of_people,
        ]);
        return view("user.done");
    }

    public function destroy($id)
    {
        $item = Reservation::where("id",$id)->delete();
        if($item){
            return response()->json([
                "message" => "Deleted Reservation"
            ]);
        }else{
            return response()->json([
                "message" => "Not Found"
            ]);
        }
    }
}
