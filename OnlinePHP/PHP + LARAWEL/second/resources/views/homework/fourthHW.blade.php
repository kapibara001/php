<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/forPhoneCard.css'])
    <title>Четвертое задание</title>
</head>
<body>
    <a href="{{ route('pageWithAllHW') }}">Back</a>

    <h1 style="width:100%; text-align: center;">Магазин</h1>

    <div class="content">
        <div class="centerJustify">
            <div class="PhonesCards">

                {!! $readyDivs !!}

            </div>
        </div>
    </div>
</body>
</html>