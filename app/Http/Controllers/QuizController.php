<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Choice;
use App\Models\Note;
use App\Models\Learner;

class QuizController extends Controller
{
    public function show(Quiz $quiz, Choice $choice, Note $note, Learner $learner)
    {
        $choice = Choice::where('quiz_id', $quiz->id)->first();
        //dd($choice);
        return view('learners/quizzes')->with([
            'quiz' => $quiz,
            'choice' => $choice,
            'note' => $note,
            'learner' => $learner
        ]);
    }
    public function create(Quiz $quiz, Note $note, Learner $learner)
    {
        return view('learners/create_quiz')->with([
            'quiz' => $quiz,
            'note' => $note,
            'learner' => $learner,
            'notes' => $note->get()
        ]);
    }

    public function edit(Quiz $quiz, Note $note, Learner $learner)
    {
        return view('learners/edit_quizzes')->with([
            'quiz' => $quiz,
            'note' => $note,
            'learner' => $learner,
            'notes' => $note->get()
        ]);
    }

    public function result()
    {
        return view('learners/quiz_result');
    }

    /*
    public function show_quiz(Quiz $quiz, Choice $choice, $title)
    {
        $quiz = Quiz::where('title', 'テストクイズ')->distinct()->select('title');
        //dd($quiz);
        return view('learners/show_quiz')->with([
            'quiz' => $quiz, 
            'choice' => $choice,
            'quizzes' => $quiz->get()
        ]);
    }
    */
    public function update(Request $request, Quiz $quiz)
    {
        $input_quiz = $request['quiz'];
        $quiz->fill($input_quiz)->save();
        return redirect('/learners/quizzes/{quiz}/' . $quiz->id);
    }

    public function delete(Quiz $quiz)
    {
        $quiz->delete();
        return redirect('/learners/note/{note}');
    }

    public function challenge(Quiz $quiz, Choice $choice)
    {
        //$title = $request->input('title');
        $quizzes = Quiz::where('title', $_GET['title'])->get();
        //$times = Quiz::where('title', $_GET['title'])->select('time')->get();
        //$choices = Choice::where('quiz_id', $quizzes->id)->get();
        return view('learners/challenge_quiz')->with([
            'quiz' => $quiz,
            'choice' => $choice,
            'quizzes' => $quizzes,
            //'times' => $times
            //'choices' => $choices
        ]);
    }

    public function store(Request $request, Quiz $quiz)
    {
        $input = $request['quiz'];
        $quiz->fill($input)->save();
        return redirect('/learners/create_choice/' . $quiz->id);
    }
}
