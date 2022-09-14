<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Study</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>{{ $learner->name }}さんの学習部屋</h1>
        <p>ログイン日時: {{ $now }}</p>
        <div class="note">
        <h2>ノート一覧</h2>
            @foreach ($notes as $note)
                <a href="/learners/note/{{ $note->id }}">{{ $note->title }}</a>
            @endforeach
            <p>{{ $notes->links('pagination::bootstrap-4') }}</p>
        </div>
        <div class="quiz">
        <h2>クイズ一覧</h2>
            @foreach ($quizzes as $quiz)
                <a href="/learners/quizzes/{{ $quiz->id }}">{{ $quiz->title }}</a>
            @endforeach
            <p>{{ $quizzes->links('pagination::bootstrap-4') }}</p>
        </div>
        <div class="challenge">
        <h2>クイズに挑戦！</h2>
            @foreach ($quizzes as $quiz)
                <a href="/learners/quizzes/challenge_quiz/{{ $quiz->id }}">{{ $quiz->title }}</a>
            @endforeach
            <p>{{ $notes->links('pagination::bootstrap-4') }}</p>
        </div>
        <div class="goal">
        <h2>目標一覧</h2>
            @foreach ($goals as $goal)
                @if($today->lt($goal->goal_date))
                    @php
                        $diff = $today->diffInDays($goal->goal_date);
                    @endphp
                @else
                    @php
                        $diff = 0;
                    @endphp
                @endif
                <a href="/learners/goal/{{ $goal->id }}">[試験名]:{{ $goal->title }} [試験日]:{{ $goal->goal_date }} [残り日数]:{{ $diff }}日</a>
            @endforeach
            <p>{{ $goals->links('pagination::bootstrap-4') }}</p>
        </div>
        <div class="create_note">
            [<a href='learners/create_note/{{ $learner->id }}'>ノートを作成する</a>]
        </div>

        <div class="set_quiz">
            [<a href='/learners/create_quiz/{{ $learner->id }}'>クイズを作成する</a>]
        </div>

        <div class="set_goal">
            [<a href='goals/goal/{{ $learner->id }}'>目標を設定する</a>]
        </div>
    
    </body>
</html>