<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\User;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\GenreRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\RegisterMail;
use App\Models\Genre;
use App\Models\Area;

class AdminContorller extends Controller
{
    public function index()
    {
        $admins = Owner::all();
        return view("admin.mypage",[
            "admins" => $admins
        ]);
    }

    public function createEmail()
    {
        return view("admin.send_mail");
    }

    public function storeEmail(EmailRequest $request)
    {
        $users = User::all();
        $subject = $request->subject;
        $text = $request->text;
        foreach($users as $user){
            $user = $user["email"];

            Mail::send(new RegisterMail($user,$text,$subject));
        }
        return view("admin.completion",[
            "message" => "メール送信が完了しました。"
        ]);
    }

    public function createGenre()
    {
        return view("admin.create_genre");
    }

    public function storeGenre(GenreRequest $request)
    {
        $path = $request->file("image")->store("images","s3");
        Storage::disk("s3")->setVisibility($path,"public");

        $image = Genre::create([
            "name" => $request->name,
            "image" => Storage::disk("s3")->url($path)
        ]);
        return view("admin.completion",[
            "message" => "ジャンルを追加しました。"
        ]);
    }

    public function createArea()
    {
        return view("admin.create_area");
    }

    public function storeArea(AreaRequest $request)
    {
        Area::create([
            "name" => $request->name
        ]);
        return view("admin.completion",[
            "message" => "エリアを追加しました。"
        ]);
    }

}
