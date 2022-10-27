<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Learner;
use App\Models\Note;
use App\Models\Quiz;
use App\Models\Goal;

class StudyController extends Controller
{
    public function index(Request $request, User $user, Note $note, Quiz $quiz, Goal $goal)
    {
        $today = Carbon::today();
        $now = Carbon::now();
        $user_id = Auth::user()->id;
        $notes = Note::where('user_id', $user_id)->paginate(3);
        $quizzes = Quiz::where('user_id', $user_id)->paginate(3);
        $goals = Goal::where('user_id', $user_id)->paginate(1);
        $keyword = $request->input('q_word');
        $sc_keyword = $request->input('s_word');

        $query = Quiz::query();
        //$query2 = Quiz::query();

        if (!empty($keyword)) {
            $query->where('title', $keyword)
                ->orWhere('subject', 'LIKE', "%{$keyword}%")
                ->orWhere('category', 'LIKE', "%{$keyword}%");
        }
        
        $search_quizzes = $query->paginate(3);
        /*
        if (!empty($sc_keyword)) {
            $query2->Where('subject', 'LIKE', "%{$sc_keyword}%")
                  ->orWhere('category', 'LIKE', "%{$sc_keyword}%");
        }
        
        $sc_search_quizzes = $query2->get();
        */
        return view('learners/index')->with([
            'user' => $user,
            'note' => $note,
            'quiz' => $quiz,
            'goal' => $goal,
            'today' => $today,
            'now' => $now,
            'notes' => $notes,
            'quizzes' => $quizzes,
            'search_quizzes' => $search_quizzes,
            'goals' => $goals
        ]);
    }

    
    /*
    public function index(){
        $items = DB::select('select * from learners');
        return view('/test',['items' => $items]);
    }
    */
}
