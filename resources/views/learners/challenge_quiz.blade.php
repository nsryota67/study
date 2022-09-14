<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Challenge Quiz</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p>{{ $quiz->subject }}>{{ $quiz->category }}>{{ $quiz->grade }}</p>
        <p>{{ $quiz->my_comment }}</p>
        <p>制限時間：{{ $quiz->time }}</p>
        <h1>{{ $quiz->title }}</h1>
        <h2>問題</h2>
        <p>{{ $quiz->question }}</p>
        <h2>選択肢</h2>
        
    </body>
</html>