<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Challenge Quiz</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/learners/quizzes/learners/quiz_result" id="question_form">
            @csrf
        <h1>{{ $title->title }}</h1>

        <div id="countdownArea" class="countdown">
            <p>残り時間</p>
            <span id="countdown-hour"></span>時間
            <span id="countdown-min"></span>分
            <span id="countdown-sec"></span>秒
        </div>
        @php
        $sum_time = 0;
        $count = 0;
        @endphp

        @for($i = 0; $i < count($quizzes); $i++)
            @php
                $sum_time = $sum_time + $quizzes[$i]->time;
            @endphp
            {{--<p>{{ $quizzes[$i]->subject }}>{{ $quizzes[$i]->category }}>{{ $quizzes[$i]->grade }}</p>
            <p>{{ $quizzes[$i]->my_comment }}</p>--}}
            <p>制限時間：{{ $quizzes[$i]->time }}</p>
            <h2>問題</h2>
            <p>{{ $quizzes[$i]->question }}</p>
            <h2>選択肢</h2>
            @for($j = 0; $j < count($quizzes); $j++) 
                @if($quizzes[$i]->id === $choices[$j]->quiz_id) 
                    <input name="q{{ $j }}" type="checkbox" value="1">{{ $choices[$j]->choice1 }}</input>
                    <input name="q{{ $j }}" type="checkbox" value="2">{{ $choices[$j]->choice2 }}</input>
                    <input name="q{{ $j }}" type="checkbox" value="3">{{ $choices[$j]->choice3 }}</input>
                    <input name="q{{ $j }}" type="checkbox" value="4">{{ $choices[$j]->choice4 }}</input>
                @endif
            @endfor
            @php
            $count = $count + 1;
            @endphp
        @endfor
        
        <h3>制限時間</h3>
        <p>{{ $sum_time }}秒</p>
        <div class = "count">
            <input name="count" type="hidden" value={{ $count }}></input>
        </div>
        <div class = "title">
            <input name="title" type="hidden" value={{ $title->title }}></input>
        </div>
        </form>
        
        {{-- <script>
            //タイマー部
            // カウントダウンする秒数
            var sec = {{ $sum_time }};
            
            // 開始日時を設定
            var dt = new Date();


            // 終了時刻を開始日時+カウントダウンする秒数に設定
            var endDt = new Date(dt.getTime() + sec * 1000);
            
            
            // 1秒おきにカウントダウン
            var cnt = sec;
            var id = setInterval(function(){
            cnt--;
            function startShowing() { 
                alert(cnt);
            }
            // 現在日時と終了日時を比較
            dt = new Date();
            if(dt.getTime() >= endDt.getTime()){
                clearInterval(id);
                console.log("Finish!");
            }
            }, 1000);
        </script> --}}
        <script>
        setTimeout(function(){
            const form=document.getElementById('question_form');
            form.submit();
        //window.location.href = 'learners/quiz_result';
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