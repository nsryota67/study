<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Challenge Quiz</title>
        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
    </head>
    <body class="bg-blue-50">
        <form action="/learners/quizzes/learners/quiz_result" id="question_form">
            @csrf
        <h1 class="text-4xl text-center text-green-700 pt-5 h-full">{{ $title->title }}</h1>
        <div class="text-2xl text-green-700 text-left font-semibold">
            <div id="countdownArea" class="countdown">
                <p>残り時間</p>
                <span id="countdown-hour"></span>時間
                <span id="countdown-min"></span>分
                <span id="countdown-sec"></span>秒
            </div>
        </div>
        @php
        $sum_time = 0;
        $count = 0;
        @endphp

        @for($i = 0; $i < count($quizzes); $i++)
            @php
                $sum_time = $sum_time + $quizzes[$i]->time;
            @endphp
            {{-- <p>制限時間：{{ $quizzes[$i]->time }}</p> --}}
            <div class="text-2xl text-center">
                <h2 class="pt-10">問題</h2>
                <p>{{ $quizzes[$i]->question }}</p>
                <div class="pt-10 flex justify-center">
                    @for($j = 0; $j < count($quizzes); $j++) 
                        @if($quizzes[$i]->id === $choices[$j]->quiz_id)
                            <ul class="w-80 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600 text-center">
                                    <div class="flex items-center pl-3">
                                        <input id="vue-checkbox" name="q{{ $j }}" type="checkbox" value="1" class="w-10 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="vue-checkbox" class="text-center py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $choices[$j]->choice1 }}</label>
                                    </div>
                                </li>
                                <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="react-checkbox" name="q{{ $j }}" type="checkbox" value="2" class="w-10 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="react-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $choices[$j]->choice2 }}</label>
                                    </div>
                                </li>
                                <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="angular-checkbox" name="q{{ $j }}" type="checkbox" value="3" class="w-10 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="angular-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $choices[$j]->choice3 }}</label>
                                    </div>
                                </li>
                                <li class="w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                                    <div class="flex items-center pl-3">
                                        <input id="laravel-checkbox" name="q{{ $j }}" type="checkbox" value="4" class="w-10 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="laravel-checkbox" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $choices[$j]->choice4 }}</label>
                                    </div>
                                </li>
                            </ul>
                        
                        @endif
                    @endfor
                </div>
                @php
                $count = $count + 1;
                @endphp
            </div>
        @endfor
        <div class = "count">
            <input name="count" type="hidden" value={{ $count }}></input>
        </div>
        <div class = "title">
            <input name="title" type="hidden" value={{ $title->title }}></input>
        </div>
        </form>
        
        <script>
        setTimeout(function(){
            const form=document.getElementById('question_form');
            form.submit();
        }, "{{ $sum_time }}" * 1000);
        </script>
        
        <script>
                let remainTime = {{ $sum_time }};
                let countdown = setInterval(function(){
                //const now = new Date()  //今の日時
                //const target = new Date(now.getFullYear(), now.getMonth() + 1, 0,'23','59','59') //ターゲット日時を取得
                
                //指定の日時を過ぎていたら処理をしない
                if(remainTime < 0) return false 

                //差分の日・時・分・秒を取得
                //const difDay  = Math.floor(remainTime / 1000 / 60 / 60 / 24)
                const difHour = Math.floor(remainTime / 60 / 60 ) % 24
                const difMin  = Math.floor(remainTime / 60) % 60
                const difSec  = Math.floor(remainTime) % 60

                //残りの日時を上書き
                
                document.getElementById("countdown-hour").textContent = difHour
                document.getElementById("countdown-min").textContent  = difMin
                document.getElementById("countdown-sec").textContent  = difSec

                //指定の日時になればカウントを止める
                if(remainTime < 0) clearInterval(countdown)
                remainTime--;
            }, 1000)    //1秒間に1度処理
        </script>
    </body>
</html>