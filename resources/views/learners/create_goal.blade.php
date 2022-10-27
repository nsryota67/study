<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create Goal</title>
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
        <h1 class="text-4xl text-green-700 text-center font-semibold pt-10">ゴールを設定しよう！</h1>
        <form action="/goals" method="POST">
            @csrf
            <div class="text-2xl text-green-700 text-center pt-10 font-semibold">
                <p class="text-red-700">*が付いている入力欄は必須です</p>
                <h2 class="pt-10 h-0">試験名を入力</h2>
                <p class="text-red-700 pr-40">*</p>
                <input type="text" name="goal[title]" placeholder="試験名を入力してください。"/>
            </div>
            <div class="text-2xl text-green-700 text-center pt-20 font-semibold">
                <h2 class="pt-5 h-0">試験日を入力</h2>
                <p class="text-red-700 pr-40">*</p>
                <input type="date" name="goal[goal_date]" placeholder="YYYY-MM-DD"/>
            </div>
            <div class="user_id">
                <input type="hidden" name="goal[user_id]" value="{{ Auth::user()->id }}"/>
            </div>
            <div class="pt-20 text-center">
                <button class="bg-blue-500 hover:bg-blue-400 text-black font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                    <input type="submit" value="保存"/>
                </button>
            </div>
            
        </form>
    </body>
</html>