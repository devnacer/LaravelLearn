<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function show()
    {
        return view('login.show');
    }
    public function login(Request $request)
    {

        $login = $request->login;
        $password = $request->password;
        $credentials = [
            'email' => $login,
            'password' => $password
        ];
        Auth::attempt($credentials);
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->route('homePage')->with([
                'success' => 'Hello ' . $login,
            ]);
        } else {
            return back()->withErrors([
                'login' => 'Email or password not correctt  !!!',
            ])->onlyInput('login');
        }
    }
}