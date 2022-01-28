<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function createLogin()
    {

    }

    public function storeLogin()
    {
        return view("owner.login");
    }
    public function createRegister(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function storeRegister()
    {

    }

}
