<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Goal</title>
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
        <h1 class="text-4xl text-green-700 text-center h-0 font-semibold pt-10">あなたが設定した目標</h1>
        <div class="text-2xl text-center pt-10 font-semibold">
            <h2 class="pt-10">試験名：{{ $goal->title }}</h2>
            <h2 class="pt-10">試験日：{{ $goal->goal_date }}</h2>
            
            
        </div>
        <div class="pt-60">
        <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
            <ul class="flex flex-wrap items-center mt-3 text-2xl text-green-700 dark:text-gray-400 sm:mt-0">
                
                <li class="pl-80">
                    <a href="/learners/goal/edit_goal/{{ $goal->id }}" class="mr-4 hover:underline md:mr-6">目標を編集する</a>
                </li>
                
                <li class="pl-60">
                    <div class="mr-4 hover:underline md:mr-6">
                        <form action="/learners/goals/{{ $goal->id }}" id="form_{{ $goal->id }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">目標を削除する</button> 
                        </form>
                    </div>
                </li>
            </ul>
        </footer>
        </div>
    </body>
</html>