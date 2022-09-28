<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create Note</title>
    </head>
    <body>
        <h1>ノートを作成しよう！</h1>
        <form action="/notes" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="note[title]" placeholder="ノートのタイトルを入力してください。"/>
            </div>
            <div class="body">
                <h2>内容</h2>
                <textarea name="note[body]" placeholder="ノートの内容を入力してください。"></textarea>
            </div>
            <div class="subject">
                <p>科目名を入力してください</p>
                <input type="text" name="note[subject]" placeholder="科目名を入力してください。"/>
            </div>
            <div class="category">
                <p>分野名を入力してください</p>
                <input type="text" name="note[category]" placeholder="分野を入力してください。"/>
            </div>
            <div class="user_id">
                <input type="hidden" name="note[user_id]" value="{{ Auth::user()->id }}"/>
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
                <textarea name="note[comment]" placeholder="コメントの内容を入力してください。"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">
            [<a href="/learners">back</a>]
        </div>
    </body>
</html>