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
        $user = Auth::user();
        $id = Auth::id();
        Reservation::create([
            "user_id" => $id,
            "shop_id" => $request->shop_id,
            "visited_on" =>$request->date." ".$request->time,
            "number_of_people" => $request->number_of_people,
        ]);
    }
}
