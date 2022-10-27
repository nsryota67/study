<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Note</title>
        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
    </head>
    <body class="bg-blue-50">
        <div class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-5 dark:bg-gray-800">
            <ul class="flex-wrap items-center mt-3 text-2xl text-gray-500 dark:text-gray-400 sm:mt-0">
                <li class="h-full">
                    <a href="/learners">[戻る]</a>
                </li>
            </ul>
        </div>
            <h1 class="text-4xl text-center text-green-700 pt-5 h-full">クイズの編集画面です</h1>
            <div class="content">
                <form action="/edit_quizzes/{{ $quiz->id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="text-2xl text-left">
                    <div class="pt-10">
                        <p>科目名を入力してください。</p>
                        <input type="text" name="quiz[subject]" value="{{ $quiz->subject }}"/>
                    </div>
                    <div class="pt-10">
                        <p>分野名を入力してください。</p>
                        <input type="text" name="quiz[category]" value="{{ $quiz->category }}"/>
                    </div>
                    <div class="pt-10">
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
                    <div class="pt-10">
                        <h2>タイトル</h2>
                        <input type="text" name="quiz[title]" value="{{ $quiz->title }}"/>
                    </div>
                    <div class="pt-10">
                        <h2>問題</h2>
                        <input type="text" name="quiz[question]" value="{{ $quiz->question }}"/>
                    </div>
                    <div class="pt-10">
                        <p>制限時間を設定してください。（単位：秒）</p>
                        <input type="number" name="quiz[time]" value="{[ $quiz->time }}"/>
                    </div>
                    <div class="pt-10">
                        <p>コメントを残す</p>
                        <textarea name="quiz[my_comment]" rows="5" cols="80">{{ $quiz->my_comment }}</textarea>
                    </div>
                    <div class="pt-10">
                        <p>関連させたいノートを選択してください。</p>
                            <select name="quiz[note_id]">
                            @foreach ($notes as $note)
                                <option value="{{ $note->id }}">{{ $note->title }}</option>
                            @endforeach
                            </select>
                    </div>
                    </div>
                    <div class="pt-10 text-center">
                        <button class="bg-blue-500 hover:bg-blue-400 text-black font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                            <input type="submit" value="保存"/>
                        </button>
                    </div>
                </form>
            </div>
    </body>
</html>