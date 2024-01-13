<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\noteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class noteController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $notes = Note::latest()->paginate(6);
        return View('note.index', compact('notes'));
    }

    public function show(Note $note){
        return View('note.show', compact('note'));
    }

    public function create(){
        return View('note.create');
    }

    public function store(noteRequest $request){
        // $title = $request->title;
        // $desc = $request->desc;
        
        //validation
        $formFields = $request->validated();
        $formFields['profile_id'] = Auth::id(); //associe chaque note à son profile
        //insertion
        Note::create($formFields);
        return redirect()->route('notes.index')->with('success','Your note has been added !');
    }

    public function destroy(Note $note){
        $note->delete();
        return to_route('notes.index')->with('success','Your note '.$note->title.' has been deleted !');
    }

    public function edit(Note $note){ 
        return View('note.edit', compact('note'));
    }

    public function update(noteRequest $request, Note $note){ 
                //validation
                $formFields = $request->validated();
                $note->fill($formFields)->save();
                return to_route('notes.index')->with('success','Your note was updated !');

    }
}
