<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 
    <table>
        <tr><th>Name</th><th>Email</th><th>Grade</th><th>Sex</th><th>Image</th></tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->grade}}</td>
                <td>{{$item->sex}}</td>
                <td>{{$item->image}}</td>
            </tr>
        @endforeach
    </table>
 
</body>
</html>