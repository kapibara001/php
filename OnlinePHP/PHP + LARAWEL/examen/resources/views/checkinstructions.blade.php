<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Предложения к публикации</title>
    
    @vite(['resources/css/newInstr.css'])
</head>
<body>
    <a href="/">Back</a>
    <h1 style="text-align: center">Новые инструкции</h1>
    <div class="bigcont">
        <div class="smallcont">
            @foreach ($instructions as $instruction)
                <div class="instrblock">
                    <div class="topRow">
                        <div class="textBlock">
                            <p style="font-size: 25px">{{ $instruction['instName'] }}</p>
                            <p style="font-size: 20px">{{ $instruction['userDescription'] }}</p>
                            <p style="font-size: 19px">{{ $instruction['uploaded_user'] }}</p>
                        </div>

                        <div class="buttonClass">
                            <img src="https://cdn-icons-png.flaticon.com/512/166/166475.png" class="buttonaction" name="delete" data-name="{{ $instruction['instName'] }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/632/632922.png" class="buttonaction" name="aprove" data-name="{{ $instruction['instName'] }}">
                        </div>
                    </div>

                    <div class="pdfViewer">
                        <object 
                            data="data:application/pdf;base64,{{ base64_encode($instruction->file) }}" 
                            type="application/pdf" width="100%" height="600px">
                        </object>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('forms.deleteoraproveinstruction');

    @if (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @endif

    <!-- Открытие формы вынесения решения по инструкции -->
    <script>   
        document.querySelectorAll('.buttonaction').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('cont').style.display = 'flex';
            })
        });
    </script>

    <!-- Показ PDF -->
    <script>
        const blocks = document.querySelectorAll('.instrblock');

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

            document.querySelectorAll('.buttonaction').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                })
            })
        });
    </script>
</body>
</html>
