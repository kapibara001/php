<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/startpage.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1 class="headText">Поиск инструкций по названию</h1>
    <div class="mainBigCont">
        <div class="contentCont">
            <form method="GET" action="{{ route('clickBtn') }}" style="text-align: center; margin-top: 20px;">
                <input name="NameInstruction" type="text" class="InputNameInstruction" placeholder="Введите название инструкции">
                <input type="submit" value="Search" class="searchBtn">
            </form>
            
            @if (!empty($instructions))
                <div class="instructionBlock">
                    <div>
                        <ul>
                            @foreach ($instructions as $instruction)
                                <li>
                                    <h4>{{ $instruction['filename'] }}</h4>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>