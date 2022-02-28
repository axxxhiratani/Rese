<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{

    //サンクス画面に遷移
    public function thanks()
    {
        return view("thanks");
    }

    public function mypage()
    {
        return view("user.mypage");
    }

    public function show($id)
    {
        $favorites = User::where("id",$id)->with("favorites")->get();
        $reservations = User::where("id",$id)->with("reservations")->get();

        foreach($favorites[0]->favorites as $index => $favorite){
            $favorites[0]->favorites[$index]["user_id"] = $favorite->user;
            $favorites[0]->favorites[$index]["shop_id"] = $favorite->shop;
            $favorites[0]->favorites[$index]["shop_id"]["genre_id"] = $favorite->shop->genre;
            $favorites[0]->favorites[$index]["shop_id"]["area_id"] = $favorite->shop->area;
        }

        foreach($reservations[0]->reservations as $index => $reservation){
            $reservations[0]->reservations[$index]["user_id"] = $reservation->user;
            $reservations[0]->reservations[$index]["shop_id"] = $reservation->shop;
        }


        return response()->json([
            "favorites" => $favorites,
            "reservations" => $reservations
        ]);
    }
}
