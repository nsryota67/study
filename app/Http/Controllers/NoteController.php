<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;

class NoteController extends Controller
{
    public function show(Note $note, User $user)
    {
        return view('learners/note')->with(['note' => $note, 'user' => $user]);
    }

    public function create(Note $note,  User $user)
    {
        return view('learners/create_note')->with(['note' => $note, 'user' => $user]);
    }

    public function edit(Note $note, User $user)
    {
        return view('learners/edit_note')->with(['note' => $note, 'user' => $user]);
    }

    public function update(Request $request, Note $note)
    {
        $input_note = $request['note'];
        $note->fill($input_note)->save();
        return redirect('/learners');
    }

    public function delete(Note $note)
    {
        $note->delete();
        return redirect('/learners');
    }

    public function store(Request $request, Note $note)
    {
        $input = $request['note'];
        $note->fill($input)->save();
        return redirect('/learners');
    }
}
