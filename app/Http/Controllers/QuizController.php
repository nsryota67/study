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

    public function result(Request $request, Quiz $quiz)
    {
        $quiz_arr = [];
        $choices = [];
        
        $answer_arr = [];
        $count = $request['count'];
        $quiz_title = $request['title'];
        //dd($quiz_title);
        $quizzes = Quiz::where('title', $quiz_title)->get();
        
        foreach ($quizzes as $quiz) {
            array_push($quiz_arr, $quiz->id);
        }
        
        for($i = 0; $i < count($quizzes); $i++) {
            array_push($choices, Choice::where('quiz_id', $quiz_arr[$i])->first());
        }
        //ここまではオッケー！
        
        for($i = 0; $i < $count; $i++) {
            array_push($answer_arr, $request['q'.$i]);
        }
        
        return view('learners/quiz_result')->with([
            'answer_arr' => $answer_arr,
            'count' => $count,
            'quizzes' => $quizzes,
            'choices' => $choices
        ]);
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
        return redirect('/learners');
    }

    public function challenge(Quiz $quiz, Choice $choice)
    {
        $quizzes = Quiz::where('title', $_GET['title'])->get();
        $quiz_arr = [];
        $choices = [];
        foreach ($quizzes as $quiz) {
            array_push($quiz_arr, $quiz->id);
        }

        //dd($quiz_arr);
        //$choices = Choice::where('quiz_id', $_GET['id'])->get();
        $title = Quiz::where('title', $_GET['title'])->first();
        for($i = 0; $i < count($quizzes); $i++) {
            array_push($choices, Choice::where('quiz_id', $quiz_arr[$i])->first());
        }
        //$choices = Choice::where('quiz_id', )->get();
        //dd($choices[4]->choice1);
        return view('learners/challenge_quiz')->with([
            'quiz' => $quiz,
            'choice' => $choice,
            'choices' => $choices,
            'quizzes' => $quizzes,
            'title' => $title
        ]);
    }

    public function store(Request $request, Quiz $quiz)
    {
        $input = $request['quiz'];
        $quiz->fill($input)->save();
        return redirect('/learners/create_choice/' . $quiz->id);
    }
}
