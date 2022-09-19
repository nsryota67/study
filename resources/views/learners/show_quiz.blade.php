<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>select challenge quiz</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>挑戦するクイズを選ぼう！</h1>
        <div class="my_quiz">
            <h2>あなたが作成した問題一覧</h2>
            @foreach ($quizzes as $quiz)
                <a href="/learners/quizzes/{{ $quiz->id }}">{{ $quiz->title }}</a>
            @endforeach
           
        </div>
        <div class="all_quiz">
            <h2>他の人が作成した問題一覧</h2>
            @foreach ($quizzes as $quiz)
                <a href="/learners/quizzes/{{ $quiz->id }}">{{ $quiz->title }}</a>
            @endforeach
            
        </div>
        
    </body>
</html>