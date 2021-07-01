<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('category.create') }}">Добавить</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>   
                    <td>{{ $category->name }}</td>   
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}">Редактировать</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button>Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>