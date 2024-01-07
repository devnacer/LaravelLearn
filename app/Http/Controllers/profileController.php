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

        $formFields['image'] = $request->file('image')->store('profile','public'); // 'profile' == pour créer un dossier profile dans storage/app/public où stocker ses images ; 'public' == pour rendre l'image accessible à tous les utlisateurs dans le site, regade  le fichier config/filesystemps comprendre
        

        // hash
        $formFields['password'] = Hash::make($formFields['password']);

        //insertion
        Profile::create($formFields);
        // change the name of route
        return redirect()->route('note.homePage');
    }
}
