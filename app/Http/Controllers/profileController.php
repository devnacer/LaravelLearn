<?php

namespace App\Http\Controllers;

use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\profileRequest;
use function Laravel\Prompts\password;

class profileController extends Controller
{
    public function create()
    {
        return view('profile.create-profile');
    }

    public function store(profileRequest $request)
    {
        //
        // $name = $request->name;
        // $email = $request->email;
        // $password = $request->password;

        //validation
        $formFields = $request->validated();

        // hash
        $formFields['password'] = Hash::make($formFields['password']);

        //insertion
        Profile::create($formFields);
        // change the name of route
        return redirect()->route('homePage');
    }
}