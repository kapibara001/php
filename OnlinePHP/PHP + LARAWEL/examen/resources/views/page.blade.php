<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/startpage.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Инструкции</title>
</head>
<body>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="navCont">
        <div class="inNavCont">
            @guest
                <button class="btn btn-light" id="1255t">Вход</button>
                <button class="btn btn-success SighInRegBtns" id="1254t">Регистрация</button>
            @endguest

            @auth
                <button class="btn btn-primary" style="margin-right: 20px" id="loadInstruction">Загрузить инструкцию</button>
                @if (Auth::check() && Auth::user()->userstatus !== 'admin')
                    <span style="margin-right: 10px;">{{ auth()->user()->username }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выйти</button>
                    </form>
                @else 
                    <a href="/checkinginstructions" style="text-decoration: none; color: black; margin-right: 20px" class="btn btn-info">Пользовательские инструкции</a>
                    <a href="/users" style="text-decoration: none; color: black; margin-right: 20px" class="btn btn-warning">Пользователи</a>
                    <a href="/reports" style="text-decoration: none; color: white; margin-right: 20px" class="btn btn-primary">Жалобы</a>
                    <span style="margin-right: 10px;">{{ auth()->user()->username }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выйти</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>

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

                            @guest
                                <div class="actionBox">
                                    <a href="">
                                        <img src="https://img.icons8.com/?size=100&id=WXhxdMfsM3G9&format=png&color=000000" alt="" id="nonInstall">
                                    </a>
                                </div>
                            @endguest

                            @auth
                                <div class="actionBox">
                                    <a href="storage/instructions/{{ $instruction['filename'] }}" download>
                                        <img src="https://img.icons8.com/?size=100&id=WXhxdMfsM3G9&format=png&color=000000" alt="">
                                    </a>
                                </div>
                            @endauth

                            <div class="actionBox reportBtn" data-name="{{ $instruction['filename'] }}">
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

    <!-- Окно регистрации -->
    @include('forms.registrationForm')

    <!-- Окно входа -->
    @include('forms.loginForm')

    <!-- Форма отправки жалобы на инструкцию -->
    @include('forms.reportForm')

    <!-- Форма отправки заявки на загрузку инструкции -->
    @include('forms.newinst');


    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('registerinfo'))
        <script>
            alert("{{ session('registerinfo') }}")
        </script>
    @endif

    @if (session('logininfo'))
        <script>
            alert("{{ session('logininfo') }}")
        </script>
    @endif


    <!-- Скрипт по открыванию\закрыванию pdf вьювера -->
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

    <!-- Скрипт, активируюшийся при попытке скачивания у неавторизованных пользователей -->
    <script>
        const installBtn = document.getElementById('nonInstall');

        installBtn.addEventListener('click', function(){
            alert('Для скачивания файлов необходимо зарегистрироваться/авторизоваться на сайте');
        })
    </script>

</body>
</html>