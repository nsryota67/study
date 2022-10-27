<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Quiz Result</title>
        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
    </head>
    <body class="text-2xl text-center bg-blue-50">
        <div class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-5 dark:bg-gray-800">
            <ul class="flex-wrap items-center mt-3 text-2xl text-gray-500 dark:text-gray-400 sm:mt-0">
                <li class="h-full">
                    <a href="/learners">[戻る]</a>
                </li>
            </ul>
        </div>
        @php
            $score = 0;
            $rate = 0;
            $choice_num = 0;
        @endphp
        <ul class="text-green-700 font-semibold">
            <li class="text-4xl text-center pt-10">クイズのスコア</li>
        </ul>
        {{-- @php --}}
        {{-- dd($choices[1]->correct); --}}
        {{-- dd($answer_arr[1]); --}}
        {{-- @endphp --}}
        @for($i = 0; $i < $count; $i++) 
            @if($choices[$i]->correct == $answer_arr[$i]) 
                @php
                    $score = $score + 1;
                @endphp
            @endif
        @endfor
        <div class="result_score">
            <h2 class="pt-10">あなたのスコア</h2>
            <p>{{ $score }}/{{ $count }}</p>
        </div>
        <div class="result_rate">
            <h2 class="pt-10">正答率</h2>
            @php
                $rate = ($score / $count) * 100;
            @endphp
            <p>{{ $rate }}%</p>
        </div>
        {{-- <div> --}}
            {{-- @if($reply->is_liked_by_auth_user()) --}}
              {{-- <a href="{{ route('reply.unlike', ['id' => $reply->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $reply->likes->count() }}</span></a> --}}
            {{-- @else --}}
              {{-- <a href="{{ route('reply.like', ['id' => $reply->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $reply->likes->count() }}</span></a> --}}
            {{-- @endif --}}
        {{-- </div> --}}
        {{-- <p>{{ $reply->likes->count() }}</p> --}}
        
        <div class="pt-10">
            <input type="checkbox" id="radio" onclick="set_visibility();">問題と正解を表示する</input>
        </div>
        <br>
        <div class="show_correct" type="hidden" id="correct">
            
            @for($i = 0; $i < $count; $i++)
                <h2 class="pt-5">問題</h2>
                <p>{{ $quizzes[$i]->question }}</p>
                <h2 class="pt-5">選択肢<h2>
                    @for($j = 0; $j < $count; $j++) 
                        @if($quizzes[$i]->id === $choices[$j]->quiz_id)
                            <p>1. {{ $choices[$j]->choice1 }}</p>
                            <p>2. {{ $choices[$j]->choice2 }}</p>
                            <p>3. {{ $choices[$j]->choice3 }}</p>
                            <p>4. {{ $choices[$j]->choice4 }}</p>
                        @endif
                    @endfor
                <h2 class="pt-5">正解の選択肢</h2>
                    @for($j = 0; $j < $count; $j++) 
                        @if($quizzes[$i]->id === $choices[$j]->quiz_id)
                            <p>{{ $choices[$j]->correct }}</p>
                        @endif
                    @endfor
            @endfor
            {{-- <p>{{ $quizzes->links('pagination::bootstrap-4') }}</p> --}}
        </div>
        <script>
            function set_visibility() {
                if (document.getElementById('radio').checked){
                  document.getElementById('correct').style.visibility = 'visible'
                }else{
                  document.getElementById('correct').style.visibility = 'hidden'
                }
            }
            set_visibility();
        </script>
    </body>
</html>