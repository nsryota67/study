<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create Goal</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ゴールを設定しよう！</h1>
        <form action="/goals" method="POST">
            @csrf
            <div class="exam_name">
                <h2>試験名を入力</h2>
                <input type="text" name="goal[title]" placeholder="試験名を入力してください。"/>
            </div>
            <div class="exam_date">
                <h2>試験日を入力</h2>
                <input type="date" name="goal[goal_date]" placeholder="YYYY-MM-DD"/>
            </div>
            <div class="user_id">
                <input type="hidden" name="goal[user_id]" value="{{ Auth::user()->id }}"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>