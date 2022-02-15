<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class AdminContorller extends Controller
{
    //
    public function index()
    {
        $admins = Owner::all();
        return view("admin.mypage",[
            "admins" => $admins
        ]);
    }


}
