<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\noteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;

class noteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = Note::latest()->paginate(6);
        return View('note.index', compact('notes'));
    }

    public function show(Note $note)
    {
        return View('note.show', compact('note'));
    }

    public function create()
    {
        return View('note.create');
    }

    public function store(noteRequest $request)
    {
        // $title = $request->title;
        // $desc = $request->desc;

        //validation
        $formFields = $request->validated();
        $formFields['profile_id'] = Auth::id(); //associe chaque note à son profile
        //insertion
        Note::create($formFields);
        return redirect()->route('notes.index')->with('success', 'Your note has been added !');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return to_route('notes.index')->with('success', 'Your note ' . $note->title . ' has been deleted !');
    }

    public function edit(Note $note)
    {

        // //methode 2
        //  if (!Gate::allows('can-update-notes', $note)) {
        //      abort(403);
        //  };

        //methode 3 : la resume de la methode 2
        Gate::authorize('can-update-notes', $note);


        return View('note.edit', compact('note'));
    }

    public function update(noteRequest $request, Note $note)
    {
        Gate::authorize('can-update-notes', $note);

        //validation
        $formFields = $request->validated();
        $note->fill($formFields)->save();
        return to_route('notes.index')->with('success', 'Your note was updated !');
    }
}
