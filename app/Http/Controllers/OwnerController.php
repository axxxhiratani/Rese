<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function createLogin()
    {
        return view("owner.login");
    }

    public function storeLogin()
    {
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
