<?php

namespace App\Http\Controllers;

use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class profileController extends Controller
{
    public function create()
    {
        return view('profile.create-profile');
    }

    public function store(Request $request)
    {
        //
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        //validation
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|unique:profiles',
            'password' => 'required|min:2|confirmed'
        ]);

        //insertion

        Profile::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        // change the name of route
        return redirect()->route('homePage');
    }
}
