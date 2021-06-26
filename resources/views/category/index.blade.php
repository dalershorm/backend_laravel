<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('categories.create') }}">Добавить</a>
    @foreach($categories as $category)
        <li>{{ $category->name }}</li>        
    @endforeach
</body>
</html>