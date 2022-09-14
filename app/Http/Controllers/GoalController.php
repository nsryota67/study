<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use App\Models\Learner;

class GoalController extends Controller
{
    public function create(Goal $goal, Learner $learner)
    {
        return view('learners/create_goal')->with([
            'goal' => $goal, 
            'learner' => $learner
        ]);
    }

    public function show(Goal $goal, Learner $learner)
    {
        return view('learners/goal')->with([
            'goal' => $goal,
            'learner' => $learner
        ]);
    }

    public function edit(Goal $goal, Learner $learner)
    {
        return view('learners/edit_goal')->with([
            'goal' => $goal,
            'learner' => $learner
        ]);
    }

    public function update(Request $request, Goal $goal)
    {
        $input_goal = $request['goal'];
        $goal->fill($input_goal)->save();
        return redirect('/learners/goals/{goal}/' . $goal->id);
    }

    public function delete(Goal $goal)
    {
        $goal->delete();
        return redirect('/learners/goal/{goal}');
    }

    public function store(Request $request, Goal $goal)
    {
        $input = $request['goal'];
        $goal->fill($input)->save();
        return redirect('/notes/' . $goal->id);
    }
}
