<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    //
    public function show($id){
        $favorites = Favorite::where("user_id",$id)->get();
        return response()->json([
            "favorites" => $favorites
        ]);
    }

    public function store(Request $request)
    {
        $data = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id
        ];
        $favorite = Favorite::create($data);
        return response()->json([
            "message" => $favorite
        ]);
    }

    public function destroy(Request $request)
    {
        $favorite = Favorite::where([["user_id",$request->user_id],["shop_id",$request->shop_id]])->delete();
        if($favorite){
            return response()->json([
                "message" => "delete"
            ]);
        }else{
            return response()->json([
                "message" => "Not Found"
            ]);
        }
    }
}
