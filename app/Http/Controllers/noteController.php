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
        return View('show-note', compact('note'));
    }
}
