<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\OwnerLoginRequest;
use App\Http\Requests\ShopRequest;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;

class OwnerController extends Controller
{
    public function showOwner($id)
    {
        $owner = Owner::where("id",$id)->get();
        return response()->json([
            "owner" => $owner
        ],200);
    }

    public function showShop($id)
    {
        $shops = Shop::where("owner_id",$id)->paginate(8);
        foreach($shops as $index => $shop){
            $shops[$index]["genre_id"] = $shop->genre;
            $shops[$index]["area_id"] = $shop->area;
        }
        return response()->json([
            "shops" => $shops
        ],200);
    }

    public function showReservation($id)
    {
        $reservations = Reservation::all();
        $target = array();
        foreach($reservations as $reservation){
            if($reservation->shop->owner_id == $id){
                $reservation->user;
                array_push($target,$reservation);
            }
        }
        return response()->json([
            "reservations" => $target
        ]);
    }

    public function createShop()
    {
        $areas = Area::all();
        $genres = Genre::all();
        return view("owner.create_shop",[
            "areas" => $areas,
            "genres" => $genres
        ]);
    }
    public function storeShop(ShopRequest $request)
    {
        $genre = $request->genre_id;
        if($genre == 4){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg";
        }else if($genre == 14){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg";
        }else if($genre == 24){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg";
        }else if($genre == 34){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg";
        }else if($genre == 44){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg";
        }

        Shop::create([
            "owner_id" => $request->owner_id,
            "genre_id" => $request->genre_id,
            "area_id" => $request->area_id,
            "name" => $request->name,
            "overview" => $request->overview,
            "image" => $image
        ]);
        return view("owner.completion");
    }

    public function edit($id)
    {
        $shop = Shop::where("id",$id)->first();
        $areas = Area::all();
        $genres = Genre::all();
        return view("owner.edit",[
            "shop" => $shop,
            "areas" => $areas,
            "genres" => $genres
        ]);
    }

    public function updateShop(ShopRequest $request)
    {
        $genre = $request->genre_id;
        if($genre == 4){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg";
        }else if($genre == 14){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg";
        }else if($genre == 24){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg";
        }else if($genre == 34){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg";
        }else if($genre == 44){
            $image = "https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg";
        }
        Shop::where("id",$request->id)->update([
            "genre_id" => $request->genre_id,
            "area_id" => $request->area_id,
            "name" => $request->name,
            "overview" => $request->overview,
            "image" => $image
        ]);
        return redirect("/owner/index");

    }

    public function deleteShop(Request $request)
    {
        Shop::where("id",$request->id)->delete();
        return redirect("/owner/index");
    }
}
