<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Goal</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ゴールの編集画面です</h1>
        <form action="/edit_goal/{{ $goal->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="exam_name">
                <h2>試験名を入力</h2>
                <input type="text" name="goal[title]" value="{{ $goal->title }}"/>
            </div>
            <div class="exam_date">
                <h2>試験日を入力</h2>
                <input type="date" name="goal[goal_date]" value="{{ $goal->goal_date }}"/>
            </div>
            <div class="user_id">
                <input type="hidden" name="goal[user_id]" value="{{ $learner->id }}"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>