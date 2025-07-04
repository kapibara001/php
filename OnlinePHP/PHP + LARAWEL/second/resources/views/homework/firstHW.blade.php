<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Первое задание</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    <a href="{{ route('pageWithAllHW') }}">Back</a>
    <h1>Рандомный список с выделением отрицательных чисел</h1>
    <p> 
    [
        @foreach ($numbers_list as $number)
            @if ($number != $numbers_list[9])
                @if ($number < 0)
                    <span style="color: red">{{ $number }},</span>
                @else 
                    <span>{{ $number }},</span>
                @endif
            @else 
                @if ($number < 0)
                    <span style="color: red">{{ $number }}</span>
                @else 
                    <span>{{ $number }}</span>
                @endif
            @endif
        @endforeach
    ]
    </p>
</body>
</html>