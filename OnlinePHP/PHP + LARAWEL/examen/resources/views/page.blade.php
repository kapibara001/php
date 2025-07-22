<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/startpage.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="headText">Поиск инструкций по сборке техники</h1>
    <div class="mainBigCont">
        <div class="contentCont">
            <form method="GET" action="{{ route('clickBtn') }}" style="text-align: center; margin-top: 20px;">
                <input name="NameInstruction" type="text" class="InputNameInstruction" placeholder="Название или номер инструкции">
                <input type="submit" value="Search" class="searchBtn">
            </form>

            @if (isset($question))
                <div style="text-align: center; margin-top: 20px;">
                    <p>{{ $question }}</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>