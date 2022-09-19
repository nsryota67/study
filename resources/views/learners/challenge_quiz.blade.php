<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Challenge Quiz</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @foreach ($quizzes as $quiz)
        <p>{{ $quiz->subject }}>{{ $quiz->category }}>{{ $quiz->grade }}</p>
        <p>{{ $quiz->my_comment }}</p>
        <p>制限時間：{{ $quiz->time }}</p>
        <h2>問題</h2>
        <p>{{ $quiz->question }}</p>
        @endforeach
        
        @php
        $sum_time = 0;
        @endphp
        @for($i = 0; $i < count($quizzes); $i++) 
        @php
        $sum_time = $sum_time + $quiz->time;
        @endphp
        @endfor
        <h3>制限時間</h3>
        <p>{{ $sum_time }}秒</p>
        <script>
        setTimeout(function(){
        window.location.href = '/learners/quiz_result';
        }, "{{ $sum_time }}" * 1000);
        </script>
        <h2>選択肢</h2>
        
        {{-- @foreach ($choices as $choice)
            <p>{{ $choice->choice1 }}</p>
            <p>{{ $choice->choice2 }}</p>
            <p>{{ $choice->choice3 }}</p>
            <p>{{ $choice->choice4 }}</p>
        @endforeach --}}
    </body>
</html>