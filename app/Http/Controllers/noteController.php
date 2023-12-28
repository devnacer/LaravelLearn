<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class noteController extends Controller
{
    public function index(){
        $notes = Note::paginate(6);
        return View('home', compact('notes'));
    }
    public function show(Request $request){
        $id = $request->id;
        $note = Note::findOrfail($id);
        return View('note/show-note', compact('note'));
    }
    public function create(){
        return View('note/create-note');
    }
    public function store(Request $request){
        $title = $request->title;
        $desc = $request->desc;
        
        //validation
        $request->validate([
            'title' => 'required'
        ]);

        //insertion
        Note::create([
            'title' => $title,
            'desc' => $desc,
        ]);
        return redirect()->route('homePage')->with('success','Your note has been added !');
    }
}
