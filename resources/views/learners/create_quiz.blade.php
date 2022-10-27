<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create Quiz</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-blue-50">
        <div class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-5 dark:bg-gray-800">
            <ul class="flex-wrap items-center mt-3 text-2xl text-gray-500 dark:text-gray-400 sm:mt-0">
                <li class="h-full">
                    <a href="/learners">[戻る]</a>
                </li>
            </ul>
        </div>
        <h1 class="text-4xl text-green-700 text-center font-semibold pt-10">クイズを作成しよう！</h1>
        <form action="/quizzes" method="POST">
            <div class="text-2xl text-left">
                @csrf
                <p class="text-red-700">*が付いている入力欄は必須です</p>
                <div class="pt-10">
                    <p class="h-0 pl-5">科目名を入力してください。</p>
                    <p class="text-red-700">*</p>
                    <input type="text" name="quiz[subject]" placeholder="科目名を入力してください。"/>
                </div>
                <div class="pt-10">
                    <p class="">分野名を入力してください。</p>
                    <input type="text" name="quiz[category]" placeholder="分野名を入力してください。"/>
                </div>
                <div class="pt-10">
                    <p class="h-0 pl-5">学年を選択してください。</p>
                    <p class="text-red-700">*</p>
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
                    <h2 class="h-0 pl-5">タイトル</h2>
                    <p class="text-red-700">*</p>
                    <input type="text" name="quiz[title]" placeholder="クイズのタイトルを入力してください。"/>
                </div>
                <div class="pt-10">
                    <h2 class="h-0 pl-5">問題</h2>
                    <p class="text-red-700">*</p>
                    <textarea rows="10" cols="60" name="quiz[question]" rows="10" cols="120" placeholder="ノートの内容を入力してください。"></textarea>
                </div>
                <div class="pt-10">
                    <p class="h-0 pl-5">制限時間を設定してください。（単位：秒）</p>
                    <p class="text-red-700">*</p>
                    <input type="number" name="quiz[time]" placeholder="制限時間を数字で入力してください(単位:秒)"/>
                </div>
                <div class="pt-10">
                    <p>コメントを残す</p>
                    <textarea name="quiz[my_comment]"  rows="5" cols="80" placeholder="コメントを入力してください。"></textarea>
                </div>
                <div class="user_id">
                    <input type="hidden" name="quiz[user_id]" value="{{ $learner->id }}"/>
                </div>
                <div class="pt-10">
                    <p>関連させたいノートを選択してください。</p>
                        <select name="quiz[note_id]">
                        @foreach ($notes as $note)
                            <option value="{{ $note->id }}">{{ $note->title }}</option>
                        @endforeach
                        </select>
                </div>
                <div class="pt-10 text-center">
                    <button class="bg-blue-500 hover:bg-blue-400 text-black font-bold py-2 px-8 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <input type="submit" value="保存"/>
                    </button>
                </div>
            </div>
            
            {{-- <div class="text-2xl text-left pt-10"> --}}
                
            {{-- </div> --}}
        </form>
    </body>
</html>