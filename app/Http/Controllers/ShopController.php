<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;

class ShopController extends Controller
{
    //

    public function index()
    {
        return view("index");
    }

    public function showAll()
    {
        $shops = Shop::paginate(12);

        foreach($shops as $index => $shop){
            $shops[$index]["genre_id"] = $shop->genre;
            $shops[$index]["area_id"] = $shop->area;
        }

        return response()->json([
            "shops" => $shops
        ]);
    }

    public function show($id)
    {
        $shop = Shop::where("id",$id)->first();
        $data = [
            "shop" => $shop
        ];
        return view("user.reservation",$data);
    }

    public function search(Request $request)
    {
        $sql = array();
        if($request->area_id){
            $data = [
                "area_id",$request->area_id
            ];
            array_push($sql,$data);
        }
        if($request->genre_id){
            $data = [
                "genre_id",$request->genre_id
            ];
            array_push($sql,$data);
        }
        if($request->name){
            $data = [
                "name","like","%".$request->name."%"
            ];
            array_push($sql,$data);
        }

        $shops = Shop::where($sql)->paginate(12);
        foreach($shops as $index => $shop){
            $shops[$index]["genre_id"] = $shop->genre;
            $shops[$index]["area_id"] = $shop->area;
        }



        return response()->json([
            "shops" => $shops
        ]);
    }
}
