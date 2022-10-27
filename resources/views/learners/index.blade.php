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
        <p class="pt-5">ログイン日時: {{ $now }}</p>
        <div class="py-6 sm:py-8 lg:py-12">
            <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
              <!-- text - start -->
              <div class="mb-10 md:mb-16">
                <h1 class="text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">{{ Auth::user()->name }}さんの学習部屋</h1>
              </div>
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-4 md:gap-8">
                    <!-- feature - start -->
                    <div class="flex bg-gray-50 border rounded-lg divide-x">
                        <div class="flex items-center text-indigo-500 p-2 md:p-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                
                        <div class="p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-semibold mb-2">ノート</h3>
                                <div class="text-left flex flex-col">
                                    @foreach ($notes as $note)
                                        <a href="/learners/note/{{ $note->id }}">{{ $note->title }}</a>
                                    @endforeach
                                </div>
                                <p>[<a href='learners/create_note'>ノートを作成する</a>]</p>
                                <div class='paginate pt-10'>
                                    {{ $notes->links() }}
                                </div>
                        </div>
                    </div>
                    <!-- feature - end -->
            
                    <!-- feature - start -->
                    <div class="flex bg-gray-50 border rounded-lg divide-x">
                        <div class="flex items-center text-indigo-500 p-2 md:p-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                
                        <div class="p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-semibold mb-2">クイズ</h3>
                                <div class="flex flex-col">
                                    @foreach ($quizzes as $quiz)
                                        <a href="/learners/quizzes/{{ $quiz->id }}">{{ $quiz->title }}</a>
                                    @endforeach
                                </div>
                                <p>[<a href='/learners/create_quiz/{{ Auth::user()->id }}'>クイズを作成する</a>]</p>
                                <div class='paginate pt-10'>
                                    {{ $quizzes->links() }}
                                </div> 
                        </div>
                    </div>
                    <!-- feature - end -->
            
                    <!-- feature - start -->
                    <div class="flex bg-gray-50 border rounded-lg divide-x">
                        <div class="flex items-center text-indigo-500 p-2 md:p-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                
                        <div class="p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-semibold mb-2">目標</h3>
                                @foreach ($goals as $goal)
                                @if($today->lt($goal->goal_date))
                                    @php
                                        $diff = $today->diffInDays($goal->goal_date);
                                    @endphp
                                @else
                                    @php
                                        $diff = 0;
                                    @endphp
                                @endif
                                    <a href="/learners/goal/{{ $goal->id }}">[試験名]:{{ $goal->title }} [試験日]:{{ $goal->goal_date }} [残り日数]:{{ $diff }}日</a>
                                @endforeach
                                <p>[<a href='/learners/goals/goal/{{ Auth::user()->id }}'>目標を設定する</a>]</p>
                                <div class='paginate pt-10'>
                                    {{ $goals->links() }}
                                </div>
                        </div>
                    </div>
                    <!-- feature - end -->
            
                    <!-- feature - start -->
                    <div class="flex bg-gray-50 border rounded-lg divide-x">
                        <div class="flex items-center text-indigo-500 p-2 md:p-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                
                        <div class="p-4 md:p-6">
                            <h3 class="text-lg md:text-xl font-semibold mb-2">あなたのクイズに挑戦！</h3>
                            <div class="flex flex-col">
                                @foreach ($quizzes as $quiz)
                                    <a href="/learners/quizzes/challenge_quiz?title={{ $quiz->title }}">{{ $quiz->title }}</a>
                                @endforeach
                            </div>
                            <div class='paginate pt-10'>
                                {{ $quizzes->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- feature - end -->
            </div>
        </div>
                    <!-- feature - start -->
                    <div class="text-center pt-10 py-6 sm:py-8 lg:py-12 max-w-screen-2xl px-4 md:px-8 mx-auto w-1/2">
                        <div class="flex bg-gray-50 border rounded-lg divide-x text-center">
                            <div class="flex items-center text-indigo-500 p-2 md:p-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                
                            <div class="p-20 md:p-6 text-center">
                                <h3 class="text-lg md:text-xl font-semibold mb-2">みんなのクイズに挑戦！</h3>
                                <div class="p-4 md:p-6">
                                    <h3 class="text-lg md:text-xl font-semibold mb-2">クイズを検索</h3>
                                    <form action="{{url('/learners')}}" method="GET">
                                        <div clas="text-center">
                                            <input type="text" name="q_word" placeholder="検索語を入力してください">
                                        </div>
                                        
                                        <div class="pt-5 text-center">
                                            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-black dark:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                        <input type="submit" value="検索">
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="pt-5">
                                        @if($search_quizzes->count())
                                            @foreach ($search_quizzes as $search_quiz)
                                                <a href="/learners/quizzes/challenge_quiz?title={{ $search_quiz->title }}">{{ $search_quiz->title }}</a>
                                            @endforeach
                                        @else
                                            <p>見つかりませんでした。</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </body>
</html>