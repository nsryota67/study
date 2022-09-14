<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Goal</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>目標</h1>
        <h2>試験名：{{ $goal->title }}</h2>
        <h2>試験日：{{ $goal->goal_date }}</h2>
        <p class="edit">
            [<a href="/learners/goal/edit_goal/{{ $goal->id }}">edit</a>]
        </p>
        <form action="/learners/goals/{{ $goal->id }}" id="form_{{ $goal->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button> 
        </form>
        <div class="back">
            [<a href="/learners/{{ $learner->id }}">back</a>]
        </div>
    </body>
</html>