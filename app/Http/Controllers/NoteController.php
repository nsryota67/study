<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learner;
use App\Models\Note;

class NoteController extends Controller
{
    public function show(Note $note, Learner $learner)
    {
        return view('learners/note')->with(['note' => $note, 'learner' => $learner]);
    }

    public function create(Note $note, Learner $learner)
    {
        return view('learners/create_note')->with(['note' => $note, 'learner' => $learner]);
    }

    public function edit(Note $note, Learner $learner)
    {
        return view('learners/edit_note')->with(['note' => $note, 'learner' => $learner]);
    }

    public function update(Request $request, Note $note)
    {
        $input_note = $request['note'];
        $note->fill($input_note)->save();
        return redirect('/notes/' . $note->id);
    }

    public function delete(Note $note)
    {
        $note->delete();
        return redirect('/learners/note/{note}');
    }

    public function store(Request $request, Note $note)
    {
        $input = $request['note'];
        $note->fill($input)->save();
        return redirect('/notes/' . $note->id);
    }
}
