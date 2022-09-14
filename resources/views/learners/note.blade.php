<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Note</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p>{{ $note->subject }}>{{ $note->category }}>{{ $note->grade }}</p>
        <h1>{{ $note->title }}</h1>
        <p>{{ $note->body }}</p>
        <h2>コメント</h2>
        <p>{{ $note->comment }}</p>
        <p class="edit">
            [<a href="/learners/note/edit_note/{{ $note->id }}">edit</a>]
        </p>
        <form action="/learners/notes/{{ $note->id }}" id="form_{{ $note->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button> 
        </form>
        <div class="back">
            [<a href="/learners/{{ $learner->id }}">back</a>]
        </div>
    </body>
</html>