<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Note</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1 class="title">クイズの編集画面です</h1>
    <div class="content">
        <form action="/edit_quizzes/{{ $quiz->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="subject">
                <p>科目名を入力してください。</p>
                <input type="text" name="quiz[subject]" value="{{ $quiz->subject }}"/>
            </div>
            <div class="category">
                <p>分野名を入力してください。</p>
                <input type="text" name="quiz[category]" value="{{ $quiz->category }}"/>
            </div>
            <div class="grade">
                <p>学年を選択してください。</p>
                <select name="quiz[grade]">
                    <option value="J1">中学1年生</option>
                    <option value="J2">中学2年生</option>
                    <option value="J3">中学3年生</option>
                    <option value="H1">高校1年生</option>
                    <option value="H2">高校2年生</option>
                    <option value="H3">高校3年生</option>
                    <option value="U1">学部1年生</option>
                    <option value="U2">学部2年生</option>
                    <option value="U3">学部3年生</option>
                    <option value="U4">学部4年生</option>
                    <option value="社会人">社会人</option>
                </select>
            </div>
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="quiz[title]" value="{{ $quiz->title }}"/>
            </div>
            <div class="quiz">
                <h2>問題</h2>
                <input type="text" name="quiz[question]" value="{{ $quiz->question }}"/>
            </div>
            <div class="time">
                <p>制限時間を設定してください。</p>
                <input type="number" name="quiz[time]" value="{[ $quiz->time }}"/>
            </div>
            <div class="my_comment">
                <p>コメントを残す</p>
                <textarea name="quiz[my_comment]" value="{{ $quiz->my_comment }}"></textarea>
            </div>
            <div class="note_id">
                <p>関連させたいノートを選択してください。</p>
                    <select name="quiz[note_id]">
                    @foreach ($notes as $note)
                        <option value="{{ $note->id }}">{{ $note->title }}</option>
                    @endforeach
                    </select>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </div>
    </body>
</html>