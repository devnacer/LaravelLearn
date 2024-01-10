<?php

namespace App\Http\Controllers;

use App\Models\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\profileRequest;
use function Laravel\Prompts\password;

class profileController extends Controller
{
    public function index()
    {
        $profiles = Profile::paginate(6);
        return View('profile.index', compact('profiles'));
    }

    public function show(Profile $profile)
    {
        return View('profile.show', compact('profile'));
    }


    public function create()
    {
        return view('profile.create');
    }

    public function store(profileRequest $request)
    {
        //
        // $name = $request->name;
        // $email = $request->email;
        // $password = $request->password;

        //validation
        $formFields = $request->validated();
        //image
        if ($request->hasFile('image')) {

            $formFields['image'] = $request->file('image')->store('profile', 'public'); // 'profile' == pour créer un dossier profile dans storage/app/public où stocker ses images ; 'public' == pour rendre l'image accessible à tous les utlisateurs dans le site, regade  le fichier config/filesystemps comprendre
        }


        // hash
        $formFields['password'] = Hash::make($formFields['password']);

        //insertion
        Profile::create($formFields);
        // change the name of route
        return redirect()->route('notes.index')->with('success', 'the compte was added !');
    }



    public function destroy(Profile $profile)
    {
        $profile->delete();
        return to_route('profiles.index')->with('success', 'The profile ' . $profile->name . ' has been deleted !');
    }

    public function edit(Profile $profile)
    {
        return View('profile.edit', compact('profile'));
    }

    public function update(profileRequest $request, Profile $profile)
    {
        //validation
        $formFields = $request->validated();
        //image
        if ($request->hasFile('image')) {

            $formFields['image'] = $request->file('image')->store('profile', 'public'); // 'profile' == pour créer un dossier profile dans storage/app/public où stocker ses images ; 'public' == pour rendre l'image accessible à tous les utlisateurs dans le site, regade  le fichier config/filesystemps comprendre
        }
        // hash
        $formFields['password'] = Hash::make($formFields['password']);
        $profile->fill($formFields)->save();
        return to_route('profiles.index')->with('success','The profile was updated !');

    }
}
