<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Quiz Result</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @php
            $score = 0;
            $rate = 0;
        @endphp
        <h1>クイズのスコア</h1>
        
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
            <h2>あなたのスコア</h2>
            <p>{{ $score }}/{{ $count }}</p>
        </div>
        <div class="result_rate">
            <h2>正答率</h2>
            @php
                $rate = ($score / $count) * 100;
            @endphp
            <p>{{ $rate }}%</p>
        </div>
    </body>
</html>