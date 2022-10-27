<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Edit Choice</title>
        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
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
    <h1 class="text-4xl text-center text-green-700 pt-5 h-full">選択肢の編集画面です</h1>
    <div class="content">
        <form action="/edit_choice/{{ $choice->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="text-2xl text-center">
                <div class="pt-10">
                    <p>選択肢1を入力してください。</p>
                    <input type="text" name="choice[choice1]" value="{{ $choice->choice1 }}"/>
                </div>
                <div class="pt-10">
                    <p>選択肢2を入力してください。</p>
                    <input type="text" name="choice[choice2]" value="{{ $choice->choice2 }}"/>
                </div>
                <div class="pt-10">
                    <p>選択肢3を入力してください。</p>
                    <input type="text" name="choice[choice3]" value="{{ $choice->choice3 }}"/>
                </div>
                <div class="pt-10">
                    <p>選択肢4を入力してください。</p>
                    <input type="text" name="choice[choice4]" value="{{ $choice->choice4 }}"/>
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