<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Genre;

class ShopController extends Controller
{
    //

    public function index()
    {
        return view("index");
    }

    public function showAll()
    {
        $shops = Shop::all();
        $genres = Genre::all();
        for($i = 0; $i < count($shops); $i++){
            $genre_id = $shops[$i]["genre_id"];
            for($j = 0; $j < count($genres); $j++){
                if($genres[$j]["id"] === $genre_id){
                    $genre = $genres[$j];
                }
                $shops[$i]["genre_id"] = $genre;
            }
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
        return view("reservation",$data);
    }

    public function search(Request $request)
    {
        $sql = array();
        if($request->area){
            $data = [
                "area",$request->area
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

        $shops = Shop::where($sql)->get();
        $genres = Genre::all();
        for($i = 0; $i < count($shops); $i++){
            $genre_id = $shops[$i]["genre_id"];
            for($j = 0; $j < count($genres); $j++){
                if($genres[$j]["id"] === $genre_id){
                    $genre = $genres[$j];
                }
                $shops[$i]["genre_id"] = $genre;
            }
        }
        return response()->json([
            "shops" => $shops
        ]);
    }
}
