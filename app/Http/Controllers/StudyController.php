<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Learner;
use App\Models\Note;
use App\Models\Quiz;
use App\Models\Goal;

class StudyController extends Controller
{
    public function index(Learner $learner, Note $note, Quiz $quiz, Goal $goal)
    {
        $today = Carbon::today();
        $now = Carbon::now();
        //$user_note = Note::where('user_id', '1')->get();
        return view('learners/index')->with([
            'learner' => $learner,
            'note' => $note,
            'quiz' => $quiz,
            'goal' => $goal,
            'today' => $today,
            'now' => $now,
            'notes' => $note->getPaginateByLimit(),
            'quizzes' => $quiz->getPaginateByLimit(),
            'goals' => $goal->getPaginateByLimit()
        ]);
    }

    
    /*
    public function index(){
        $items = DB::select('select * from learners');
        return view('/test',['items' => $items]);
    }
    */
}
