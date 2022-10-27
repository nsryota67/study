<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Note</title>
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
                        <p>{{ $note->subject }}>{{ $note->category }}>{{ $note->grade }}</p>
                    </li>
                </ul>
            </div>
        <div class="pt-10">
            <audio
                controls
                src="https://api.su-shiki.com/v2/voicevox/audio/?text={{ $note->body }}&key=W-P4W-n-H8s907p&speaker=2">            ">
                    Your browser does not support the
                    <code>audio</code> element.
            </audio>
        </div>
        <p class="pl-5">こちらの再生ボタンを押すと、ノートの本文を音声で読み上げます。</p>
        <h1 class="text-4xl text-center text-green-700 pt-10 h-full">{{ $note->title }}</h1>
            
        <div id="body">
            <p class="break-words whitespace-pre-wrap text-2xl pt-10 pl-5">{{  $note->body }}</p>
             {{--改行を反映  --}}
        </div>
        <h2 class="pt-20">コメント</h2>
        <p>{{ $note->comment }}</p>
        <div class="pt-20">
            <footer class="p-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 dark:bg-gray-800">
                <ul class="flex flex-wrap items-center mt-3 text-2xl text-gray-500 dark:text-gray-400 sm:mt-0">
                    <li class="text-sm">
                        <p>VOICEVOX:四国めたん</p>
                    </li>
                    <li class="pl-60 text-green-700">
                        <a href="/learners/note/edit_note/{{ $note->id }}" class="mr-4 hover:underline md:mr-6">ノートを編集する</a>
                    </li>
                    <li class="pl-40 text-green-700">
                        <div class="mr-4 hover:underline md:mr-6">
                            <form action="/learners/notes/{{ $note->id }}" id="form_{{ $note->id }}" method="post" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <p type="submit">ノートを削除する</p> 
                            </form>
                        </div>
                    </li>
                </ul>
            </footer>
        </div>
            
        
    </body>
</html>