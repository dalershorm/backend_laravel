<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
       {{ method_field('PUT') }}
        <input type="text" required name="name" value="{{ $category->name }}">
        <select name="parent_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>