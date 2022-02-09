<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    //
    public function store(ReservationRequest $request)
    {
        Reservation::create([
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
            "visited_on" =>$request->date." ".$request->time,
            "number_of_people" => $request->number_of_people,
        ]);
        return view("user.done");
    }

    public function show($id)
    {
        $reservatoin = Reservation::where("id",$id)->first();
        $date =  date("Y-m-d", strtotime($reservatoin->visited_on));
        $time = date("h:i:s", strtotime($reservatoin->visited_on));/*$timeをセレクトボックスに代入したい。中身は09:00:00 */


        return view("user.edit",[
            "reservation" => $reservatoin,
            "date" => $date,
            "time" => (string)$time,
        ]);
    }

    public function update(Request $request)
    {
        $data = [
            "visited_on" =>$request->date." ".$request->time,
            "number_of_people" => $request->number_of_people,
        ];
        Reservation::where("id",$request->id)->update($data);
        return view("user.mypage");
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
