<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if (isset($role)) 
    <!-- Проверка на то, передаются ли данные с именем role  -->
        @if ($role == "admin")
            <h1>Демонстрация передачи данных</h1>

            <h2>Имя: {{ $first_name }}</h2>
            <h2>Фамилия: {{ $last_name }}</h2>
            <h2>Возраст: {{ $age }}</h2>
            <h2>Сообщение: {{ $message }}</h2>
            
            <h1>База данных:</h1>
            <h2>Название: {{ $db["dbname"] }}</h2>
            <h2>ПОРТ: {{ $db["port"] }}</h2>
        @else
            <h2>Имя: {{ $first_name }}</h2>
            <h2>Фамилия: {{ $last_name }}</h2>
            <h2>Сообщение: {{ $message }}</h2>
        @endif
    @else 
        <h2>Обратитесь к админам</h2>
    @endif

    <ul>
        @for ($i = 1; $i <= 6; $i++)
            <li>
                <h{{ $i }}>{{ $i }}</h{{ $i }}>
            </li>
        @endfor
    </ul>

    @isset($db) 
        <table>
            @foreach ($db as $key => $value)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </table>
    @endisset

    <span>
        @class (
            'text',

        )
    </span>
</body>
</html>