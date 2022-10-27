<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Create Note</title>
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
        <h1 class="text-4xl text-green-700 text-center font-semibold pt-10">ノートを作成しよう！</h1>
        <form action="/notes" method="POST">
            @csrf
            <div class="text-2xl text-left">
                <p class="text-red-700 pt-5">*が付いている入力欄は必須です</p>
                <div class="pt-10">
                    <h2 class="h-0 pl-5">タイトル</h2>
                    <p class="text-red-700">*</p>
                    <input type="text" name="note[title]" placeholder="ノートのタイトルを入力してください。"/>
                </div>
                <div class="pt-10">
                    <h2 class="h-0 pl-5">内容</h2>
                    <p class="text-red-700">*</p>
                    <textarea name="note[body]" rows="30" cols="80" placeholder="ノートの内容を入力してください。"></textarea>
                </div>
                <div class="pt-10">
                    <p class="h-0 pl-5">科目名を入力してください</p>
                    <p class="text-red-700">*</p>
                    <input type="text" name="note[subject]" placeholder="科目名を入力してください。"/>
                </div>
                <div class="pt-10">
                    <p>分野名を入力してください</p>
                    <input type="text" name="note[category]" placeholder="分野を入力してください。"/>
                </div>
                <div class="user_id">
                    <input type="hidden" name="note[user_id]" value="{{ Auth::user()->id }}"/>
                </div>
                <div class="pt-10">
                    <p class="h-0 pl-5">学年を選択してください</p>
                    <p class="text-red-700">*</p>
                    <select name="note[grade]">
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
                    <p>コメントを残す</p>
                    <textarea name="note[comment]" rows="5" cols="80" placeholder="コメントの内容を入力してください。"></textarea>
                </div>
                <div class="pt-10 text-center">
                    <button class="bg-blue-500 hover:bg-blue-400 text-black font-bold py-2 px-8 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <input type="submit" value="保存"/>
                    </button>
                </div>
            </div>
            
            {{--
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function() {
                
                  // ----------------------------------------------
                  // ▼数字とハイフン記号の入力チェック用スクリプト
                  // ----------------------------------------------
                  var targets = document.getElementsByClassName('number');
                  for (var i=0 ; i<targets.length ; i++) {
                    // ▼文字が入力されたタイミングでチェックする：
                    targets[i].oninput = function () {
                      var alertelement = this.parentNode.getElementsByClassName('alertarea');
                    //   if( ( this.value != '') && ( this.value.match( /[^\d\-]+/ )) ) {
                        // ▼何か入力があって、指定以外の文字があれば
                        // if( alertelement[0] ) { alertelement[0].innerHTML = '入力には、数字とハイフン記号だけが使えます。'; }
                        // this.style.border = "2px solid red";
                    //   }
                      if {
                        // ▼何も入力がないか、または指定文字しかないなら
                        if( alertelement[0] ) { alertelement[0].innerHTML = ""; }
                        this.style.border = "1px solid black";
                      }
                    }
                  }
                  // ----------
                  // ▲ここまで
                  // ----------
                
                });
            </script>
            --}}
        </form>
    </body>
</html>