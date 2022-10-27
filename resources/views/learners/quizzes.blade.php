<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Study</title>
        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
    </head>
    <body class="bg-blue-50">
        <div class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-10 dark:bg-gray-800">
            <ul class="flex-wrap items-center mt-3 text-2xl text-gray-500 dark:text-gray-400 sm:mt-0">
                <li class="h-0">
                    <a href="/learners">[戻る]</a>
                </li>
                <li class="text-green-700 h-0 pl-20">
                    <p>{{ $quiz->subject }}>{{ $quiz->category }}>{{ $quiz->grade }}</p>
                </li>
            </ul>
        </div>
        <p>{{ $quiz->my_comment }}</p>
        <h1 class="text-4xl text-center text-green-700 pt-5 h-full">{{ $quiz->title }}</h1>
        <p class="text-2xl text-green-700 text-center pt-10">制限時間：{{ $quiz->time }}秒</p>
        <div class="text-2xl text-center">
            <h2 class="pt-10 text-green-700">問題</h2>
            <p class="pt-5">{{ $quiz->question }}</p>
            <h2 class="pt-5 text-green-700">選択肢</h2>
            <p class="pt-5">{{ $choice->choice1 }}</p>
            <p>{{ $choice->choice2 }}</p>
            <p>{{ $choice->choice3 }}</p>
            <p>{{ $choice->choice4 }}</p>
            
            <div class="pt-10">
            <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
                <ul class="flex flex-wrap items-center mt-3 text-xl text-green-700 dark:text-gray-400 sm:mt-0">
                    <li class="pl-10">
                        <a href="/learners/note/{{ $quiz->note_id}}" class="mr-4 hover:underline md:mr-6">関連するノートを見る</a>
                    </li>
                    <li class="pl-10">
                        <a href="/learners/quizzes/edit_quiz/{{ $quiz->id }}" class="mr-4 hover:underline md:mr-6">問題を編集する</a>
                    </li>
                    <li class="pl-10">
                        <a href="/learners/choice/edit_choice/{{ $choice->id }}" class="mr-4 hover:underline md:mr-6">選択肢を編集する</a>
                    </li>
                    <li class="pl-10">
                        <div class="mr-4 hover:underline md:mr-6">
                            <form action="/learners/quizzes/{{ $quiz->id }}" id="form_{{ $quiz->id }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                    <button type="submit">問題を削除する</button> 
                            </form>
                        </div>
                    </li>
                    <li class="pl-10">
                        <div class="mr-4 hover:underline md:mr-6">
                            <form action="/learners/choices/{{ $choice->id }}" id="form_{{ $choice->id }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                    <button type="submit">選択肢を削除する</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </footer>
            </div>
        </div>
        
    </body>
</html>