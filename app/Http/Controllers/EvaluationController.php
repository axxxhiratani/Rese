<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Evaluation;
use App\Http\Requests\EvaluationRequest;

class EvaluationController extends Controller
{
    //
    public function show($id)
    {
        $reservation = Reservation::where("id",$id)->first();
        // return $reservation->user_id;
        return view("user.evaluation",[
            "reservation" => $reservation
        ]);
    }

    public function store(EvaluationRequest $request)
    {
        Evaluation::create([
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
            "evaluation" => $request->evaluation,
            "comment" => $request->comment,
        ]);
        return view("user.mypage");
    }
}
