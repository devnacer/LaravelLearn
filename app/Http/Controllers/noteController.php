<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\noteRequest;
use Illuminate\Support\Facades\View;

class noteController extends Controller
{
    public function index(){
        $notes = Note::paginate(6);
        return View('home', compact('notes'));
    }
    public function show(Note $note){
        return View('note/show-note', compact('note'));
    }
    public function create(){
        return View('note/create-note');
    }
    public function store(noteRequest $request){
        // $title = $request->title;
        // $desc = $request->desc;
        
        //validation
        $formFields = $request->validated();
        //insertion
        Note::create($formFields);
        return redirect()->route('homePage')->with('success','Your note has been added !');
    }
    public function destroy(Note $note){
        $note->delete();
        return to_route('homePage')->with('success','Your note '.$note->title.' has been deleted !');
    }
}
