<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Choice</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1 class="title">選択肢の編集画面です</h1>
    <div class="content">
        <form action="/edit_choice/{{ $choice->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="choice1">
                <p>選択肢1を入力してください。</p>
                <input type="text" name="choice[choice1]" value="{{ $choice->choice1 }}"/>
            </div>
            <div class="choice2">
                <p>選択肢2を入力してください。</p>
                <input type="text" name="choice[choice2]" value="{{ $choice->choice2 }}"/>
            </div>
            <div class="choice3">
                <p>選択肢3を入力してください。</p>
                <input type="text" name="choice[choice3]" value="{{ $choice->choice3 }}"/>
            </div>
            <div class="choice4">
                <p>選択肢4を入力してください。</p>
                <input type="text" name="choice[choice4]" value="{{ $choice->choice4 }}"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </div>
    </body>
</html>