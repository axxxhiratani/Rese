<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    //会員登録画面に遷移
    // public function register()
    // {
    //     return redirect("register");
    // }

    // //会員登録の実装
    // public function store(Request $request)
    // {
    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     return redirect("thanks");
    // }

    //サンクス画面に遷移
    public function thanks()
    {
        return view("thanks");
    }

}
