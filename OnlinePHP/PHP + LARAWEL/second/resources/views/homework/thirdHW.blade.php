<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Третье задание</title>
</head>
<body>
    <a href="{{ route('pageWithAllHW') }}">Back</a>
    <h1>Рандоманая генерация точек</h1> 

    <form action="{{ route('Third') }}">
        <input type="number" placeholder="Количество точек" name="pointCount" max="1377">
        <button type="submit" name="StartGeneration">Отправить</button>
    </form>

    {!! $readyDiv !!}
</body>
</html>