<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            return redirect()->route('note.homePage')->with([
                'success' => 'Hello ' . $login,
            ]);
        } else {
            return back()->withErrors([
                'login' => 'Email or password not correctt  !!!',
            ])->onlyInput('login');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }
}
