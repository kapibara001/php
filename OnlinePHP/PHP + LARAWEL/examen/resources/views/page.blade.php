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
    <h1 class="headText">Инструкции к мебели</h1>
    <div class="mainBigCont">
        <div class="contentCont">
            <form method="GET" action="{{ route('clickBtn') }}" style="text-align: center; margin-top: 20px;">
                <input name="NameInstruction" type="text" class="InputNameInstruction" placeholder="Введите название инструкции" value="{{ $find }}" style="margin-bottom: 10px">
                <input type="submit" value="Search" class="searchBtn">
            </form>
            
            @if (!empty($instructions))
                @php
                    $num = 1;
                @endphp
                @foreach ($instructions as $instruction)
                    <div class="instructionBlock">
                        <div class="instructionInfo">
                            <div class="numInfoBlock">{{ $num }}</div>
                            <div class="InstrNameCss">
                                <span>{{ $instruction['filename'] }}</span>
                            </div>
                            <div class="actionBox">
                                <img src="https://img.icons8.com/?size=100&id=WXhxdMfsM3G9&format=png&color=000000" alt="">
                            </div>
                            <div class="actionBox">
                                <img src="https://img.icons8.com/?size=100&id=zqm8qSQh4GJU&format=png&color=000000" alt="">
                            </div>

                            <div class="pdfViewerContainer">
                                <object data="storage/instructions/{{ $instruction['filename'] }}" type="application/pdf" width="100%" height="600px"></object>
                            </div>
                        </div>
                    </div>
                    @php
                        $num += 1
                    @endphp
                @endforeach
            @endif
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const blocks = document.querySelectorAll('.instructionInfo');

            blocks.forEach(block => {
                block.addEventListener('click', function () {
                    const isActive = block.classList.contains('active');

                    // Закрыть 
                    blocks.forEach(b => b.classList.remove('active'));

                    // Открыть 
                    if (!isActive) {
                        block.classList.add('active');
                    }
                });
            });
        });
    </script>
</body>
</html>