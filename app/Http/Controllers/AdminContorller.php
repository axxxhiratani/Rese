<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\User;
use App\Http\Requests\EmailRequest;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMail;

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
        return view("admin.sent");
    }


}
