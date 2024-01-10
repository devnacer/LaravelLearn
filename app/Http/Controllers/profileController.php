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
        // $notes = Note::paginate(6);
        // return View('note.index', compact('notes'));
    }

    public function show()
    {
        // return View('note.show', compact('note'));
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



    public function destroy()
    {
        // $note->delete();
        // return to_route('notes.index')->with('success','Your note '.$note->title.' has been deleted !');
    }

    public function edit()
    {
        // return View('note.edit', compact('note'));
    }

    public function update()
    {
        //validation
        // $formFields = $request->validated();
        // $note->fill($formFields)->save();
        // return to_route('notes.index')->with('success','Your note was updated !');

    }
}
