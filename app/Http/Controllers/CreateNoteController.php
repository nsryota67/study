<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class CreateNoteController extends Controller
{
    public function create(Note $note)
    {
        return view('learners/create_note')->with(['note' => $note]);
    }
}
