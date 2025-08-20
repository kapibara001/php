<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/reports.css'])
    <title>Жалобы</title>
</head>
<body>
    <a href="{{ route('clickBtn') }}">Back</a>
    <h1 style="text-align: center">Жалобы на инструкции</h1>
    <div class="bigCont">
        <div class="smallCont">
            @foreach ($reports as $report)
                <div class="reportBlock">
                    <p style="font-size: 25px">
                        <b>
                            <a href="http://127.0.0.1:8000/?NameInstruction={{ $report['reportName'] }}" class="reportLink">
                                {{ $report['reportName'] }}
                            </a>
                        </b>
                    </p>
                    <p style="font-size: 20px">{{ $report['reportText'] }}</p>
                    <p style="font-size: 17px">Пользователь: user</p>
                    <div class="adminActions"> <!-- Функции адмиина по заданию (удалить инструкцию и тп) -->

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>