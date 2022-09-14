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
            <h1>問題の選択肢を作成しよう！</h1>
            <h2>問題：{{ $quiz->title }}</h2>
            <div class="choice1">
                <p>選択肢1を入力してください。</p>
                <input type="text" name="choice[choice1]" placeholder="選択肢1を入力してください。"/>
            </div>
            <div class="choice2">
                <p>選択肢2を入力してください。</p>
                <input type="text" name="choice[choice2]" placeholder="選択肢2を入力してください。"/>
            </div>
            <div class="choice3">
                <p>選択肢3を入力してください。</p>
                <input type="text" name="choice[choice3]" placeholder="選択肢3を入力してください。"/>
            </div>
            <div class="choice4">
                <p>選択肢4を入力してください。</p>
                <input type="text" name="choice[choice4]" placeholder="選択肢4を入力してください。"/>
            </div>
            <div class="correct">
                <p>正解の選択肢を選択してください</p>
                    <select name="choice[correct]">
                        <option value="1">選択肢1</option>
                        <option value="2">選択肢2</option>
                        <option value="3">選択肢3</option>
                        <option value="4">選択肢4</option>
                    </select>
            </div>
            <div class="quiz_id">
                <input type="hidden" name="choice[quiz_id]" value="{{ $quiz->id }}"/>
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>