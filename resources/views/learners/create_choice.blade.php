<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create Choice</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-blue-50">
        <h1 class="text-2xl text-green-700 text-left font-semibold">クイズを作成しよう！</h1>
        <form action="/choices" method="POST">
            @csrf
            <h1 class="text-4xl text-green-700 text-center h-0 font-semibold">問題の選択肢を作成しよう！</h1>
            <h2 class="text-2xl text-green-700 text-left h-0 font-semibold">問題：{{ $quiz->title }}</h2>
            <div class="text-2xl text-right pr-10 text-green-700 font-semibold">[<a href="/learners">戻る</a>]</div>
            <div class="text-2xl text-left">
                <div class="pt-20">
                    <p>選択肢1を入力してください。</p>
                    <input type="text" name="choice[choice1]" placeholder="選択肢1を入力してください。"/>
                </div>
                <div class="pt-10">
                    <p>選択肢2を入力してください。</p>
                    <input type="text" name="choice[choice2]" placeholder="選択肢2を入力してください。"/>
                </div>
                <div class="pt-10">
                    <p>選択肢3を入力してください。</p>
                    <input type="text" name="choice[choice3]" placeholder="選択肢3を入力してください。"/>
                </div>
                <div class="pt-10">
                    <p>選択肢4を入力してください。</p>
                    <input type="text" name="choice[choice4]" placeholder="選択肢4を入力してください。"/>
                </div>
                <div class="pt-10">
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
                <div class="pt-5 text-center">
                    <button class="bg-blue-500 hover:bg-blue-400 text-black font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <input type="submit" value="保存"/>
                    </button>
                </div>
            </div>
        </form>
    </body>
</html>