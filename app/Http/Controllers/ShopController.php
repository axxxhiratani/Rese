<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    //

    public function index()
    {
        $shops = Shop::all();
        $data = [
            "shops" => $shops
        ];
        return view("index",$data);
    }

    public function show($id)
    {
        $shop = Shop::where("id",$id)->first();
        $data = [
            "shop" => $shop
        ];
        return view("reservation",$data);
    }
}
