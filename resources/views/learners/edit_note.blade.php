<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Note</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <h1 class="title">ノートの編集画面です</h1>
    <div class="content">
        <form action="/edit_note/{{ $note->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="note[title]" value="{{ $note->title }}"/>
            </div>
            <div class="body">
                <h2>内容</h2>
                <textarea name="note[body]" value="{{ $note->body }}"></textarea>
            </div>
            <div class="subject">
                <p>科目名を入力してください</p>
                <input type="text" name="note[subject]" value="{{ $note->subject }}"/>
            </div>
            <div class="category">
                <p>分野名を入力してください</p>
                <input type="text" name="note[category]" value="{{ $note->category }}"/>
            </div>
            
            <div class="grade">
                <p>学年を選択してください</p>
                <select name="note[grade]">
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
            <div class="comment">
                <p>コメントを残す</p>
                <textarea name="note[comment]" value="{{ $note->comment }}"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
    </div>
    </body>
</html>