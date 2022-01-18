<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

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
        if($request->genere_id){
            $data = [
                "genere_id",$request->genere_id
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

        return response()->json([
            "shops" => $shops
        ]);
    }
}
