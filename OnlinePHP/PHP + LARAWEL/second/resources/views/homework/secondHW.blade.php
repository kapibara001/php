<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Второе задание</title>
</head>
<body>
    <a href="/homework">Back</a>

    <form method="GET" action="{{ route('Second') }}">
        <h1>Задание с конвертацией числа в буквенное значение</h1>
        <input type="text" name="nums">
        <input type="submit" value="Конвертировать">
    </form>

    @if (isset($result))
        <h2>Резузльтат преобразования: {{ $result }}</h2>
    @endif
</body>
</html>