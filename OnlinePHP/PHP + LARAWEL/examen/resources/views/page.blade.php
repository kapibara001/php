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
    @guest
        <div class="navCont">
            <div class="inNavCont">
                <button class="btn btn-light">Вход</button>
                <button class="btn btn-success SighInRegBtns" id="1254t">Регистрация</button>
            </div>
        </div>
    @endguest

    <!-- Если пользователь авторизован, тут должен быть аватар профиля и его имя -->
    @auth 

    @endauth
    

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
                                <a href="storage/instructions/{{ $instruction['filename'] }}" download>
                                    <img src="https://img.icons8.com/?size=100&id=WXhxdMfsM3G9&format=png&color=000000" alt="">
                                </a>
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

    <div class="contForReg hiden">
        <div class="reg">
            <div class="closeBtn">
                <p>
                    <img src="https://www.svgrepo.com/show/510921/close-lg.svg" alt="" id="closeBtn">
                </p>
                <div class="regContent">
                    <h1 class="textReg">Регистрация</h1>
                    <h5 class="textReg">Откройте новые возмонжости после регистрации</h5>

                    <form action="{{ route('identification') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div style="color: red; margin-bottom: 10px;">
                                <ul style="margin: 0; padding-left: 20px;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="name">
                        </div>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping" name="password">
                        </div>

                        <div style="text-align: center; margin-top: 10px;">
                            <button class="btn btn-primary" type="submit" name="registration">Зарегистрироваться</button>
                            <span>или</span>
                            <button class="btn btn-secondary" type="submit" name="signin">Войти</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script> // Скрипт по открыванию\закрыванию pdf вьювера
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

    <script> // Закрытие/открытие окна регистрации 
        const closeBtn = document.getElementById('closeBtn');
        const regWindow = document.getElementsByClassName('contForReg')[0];

        const openRegWindow = document.getElementById('1254t');

        closeBtn.onclick = function() {
            regWindow.style.display = 'none';
        }

        openRegWindow.onclick = function() {
            regWindow.style.display = 'flex';
        }
    </script>
</body>
</html>