<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Study</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p>{{ $quiz->subject }}>{{ $quiz->category }}>{{ $quiz->grade }}</p>
        <p>{{ $quiz->my_comment }}</p>
        <p>制限時間：{{ $quiz->time }}分</p>
        <h1>{{ $quiz->title }}</h1>
        <div class="quiz">
            <h2>問題</h2>
            <p>{{ $quiz->question }}</p>
        </div>
        <div class="choice">
            <h2>選択肢</h2>
            <p>{{ $choice->choice1 }}</p>
            <p>{{ $choice->choice2 }}</p>
            <p>{{ $choice->choice3 }}</p>
            <p>{{ $choice->choice4 }}</p>
        </div>
        <p class="note">
            [<a href="/learners/note/{{ $quiz->note_id}}">関連するノートを見る</a>]
        </p>
        <p class="edit_quiz">
            [<a href="/learners/quizzes/edit_quiz/{{ $quiz->id }}">問題を編集する</a>]
        </p>
        <p class="edit_choice">
            [<a href="/learners/choice/edit_choice/{{ $choice->id }}">選択肢を編集する</a>]
        </p>
        <form action="/learners/quizzes/{{ $quiz->id }}" id="form_{{ $quiz->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">問題を削除する</button> 
        </form>
        <form action="/learners/choices/{{ $choice->id }}" id="form_{{ $choice->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">選択肢を削除する</button> 
        </form>
        <div class="back">
            [<a href="/learners">back</a>]
        </div>
    </body>
</html>