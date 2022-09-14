<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Choice;

class ChoiceController extends Controller
{
    public function create(Quiz $quiz, Choice $choice)
    {
        return view('learners/create_choice')->with([
            'quiz' => $quiz, 
            'choice' => $choice
        ]);
    }
    
    public function edit(Quiz $quiz, Choice $choice)
    {
        return view('learners/edit_choice')->with([
            'quiz' => $quiz,
            'choice' => $choice
        ]);
    }

    public function answer(Quiz $quiz, Choice $choice)
    {
        return view('learners/answer')->with([
            'quiz' => $quiz,
            'choice' => $choice
        ]);
    }

    public function update(Request $request, Choice $choice, Quiz $quiz)
    {
        $input_choice = $request['choice'];
        $choice->fill($input_choice)->save();
        return redirect('/learners/quizzes/{quiz}/' . $quiz->id);
    }

    public function delete(Choice $choice)
    {
        $choice->delete();
        return redirect('/learners/note/{note}');
    }

    public function store(Request $request, Choice $choice, Quiz $quiz)
    {
        $input = $request['choice'];
        $choice->fill($input)->save();
        return redirect('/learners/quizzes/' . $quiz->id);
    }
}
