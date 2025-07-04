<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/phonesCSS.css">
    <title>4 задание</title>
</head>
<body>
    <a href="{{ route('pageWithAllHW') }}">Back</a>

    <div style="width: 100%; height: 100%; display: flex; justify-content: center; ">
        <div style="width: 1500px; height: 100%; display: flex; justify-content: center;">
            <div style="display: grid; grid-template-columns: 300px 300px 300px 300px 300px; grid-template-rows: 400px; column-gap: 15px">

                {!! $readyDivs !!}

            </div>
        </div>
    </div>
</body>
</html>