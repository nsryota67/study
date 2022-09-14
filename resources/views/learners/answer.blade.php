<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create Choice</title>
    </head>
    <body>
        <h1>クイズを作成しよう！</h1>
        <form action="/choices" method="POST">
            @csrf
            <h1>問題の正しい選択肢を設定してください</h1>
            <h2>問題：{{ $quiz->title }}</h2>
            <div class="choice1">
                <p>選択肢1</p>
                <p>{{ $choice->choice1 }}</p>
            </div>
            <div class="choice2">
                <p>選択肢2</p>
                <p>{{ $choice->choice2 }}</p>
            </div>
            <div class="choice3">
                <p>選択肢3</p>
                <p>{{ $choice->choice3 }}</p>
            </div>
            <div class="choice4">
                <p>選択肢4</p>
                <p>{{ $choice->choice4 }}</p>
            </div>
            <div class="correct">
                <p>正解の選択肢を選択してください</p>
                    <select name="choice[correct]">
                        <option value="{{ $choice->choice1 }}">選択肢1</option>
                        <option value="{{ $choice->choice2 }}">選択肢2</option>
                        <option value="{{ $choice->choice3 }}">選択肢3</option>
                        <option value="{{ $choice->choice4 }}">選択肢4</option>
                    </select>
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>