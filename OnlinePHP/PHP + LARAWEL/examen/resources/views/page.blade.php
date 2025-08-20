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
                <button class="btn btn-light" id="1255t">Вход</button>
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
    <div class="bgblacker hiden" id="regwin">
        <div class="reg">
            <div class="closeBtn">
                <p>
                    <img src="https://www.svgrepo.com/show/510921/close-lg.svg" id="closeRegBtn">
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
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Окно входа -->
    <div class="bgblacker hiden" id="signwin">
        <div class="reg">
            <div class="closeBtn">
                <p>
                    <img src="https://www.svgrepo.com/show/510921/close-lg.svg" id="closeSignBtn">
                </p>
                <div class="signContent">
                    <h1 class="textReg">Вход в аккаунт</h1>

                    <form action="{{ route('signin') }}" method="POST">
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
                            <button class="btn btn-primary" type="submit">Войти</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Форма отправки жалобы на инструкцию -->
    <div class="bgblacker hiden" id="report">
        <div class="rep">
            <div class="closeBtn">
                <p>
                    <img src="https://www.svgrepo.com/show/510921/close-lg.svg" alt="" id="closeRepBtn">    
                </p>
                <h2 style="text-align: center">Жалоба на инструкцию</h2>
                <form action="{{ route('reportCheck') }}" method="POST">
                    @csrf
                    
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Название инструкции" aria-label="Username" id="inpNameInst" name="reportName" readonly>
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="reportText"></textarea>
                        <label for="floatingTextarea">Текст жалобы</label>
                    </div>

                    <div style="width: 100%; display: flex; justify-content: center;">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>

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
    </div>


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

    <!-- Закрытие/открытие окна регистрации/входа-->
    <script> 
        const regWindow = document.getElementById('regwin'); // Само окно регистрации
        const closeRegWindow = document.getElementById('closeRegBtn'); // Крестик в окне регистрации
        const openRegWindow = document.getElementById('1254t'); // Кнопка регистрации сверху справа
        
        const signWindow = document.getElementById('signwin');
        const closeSignWindow = document.getElementById('closeSignBtn')
        const openSignWindow = document.getElementById('1255t')

        closeRegWindow.onclick = function() {
            regWindow.style.display = 'none';
        }

        openRegWindow.onclick = function() {
            regWindow.style.display = 'flex';
        }

        closeSignWindow.onclick = function() {
            signWindow.style.display = 'none';
        }

        openSignWindow.onclick = function() {
            signWindow.style.display = 'flex';
        }

    </script>

    <!-- Скрипт для окна жалобы -->
    <script>
        const reportWindow = document.getElementById('report'); // окно жалобы
        const closeReportWindow = document.getElementById('closeRepBtn'); // крестик в окне жалобы

        const reportInput = document.getElementById('inpNameInst'); // поле с именем инструкции в окне жалобы 

        const reportBtns = document.querySelectorAll('.reportBtn');

        reportBtns.forEach(reportBtn => {
            reportBtn.addEventListener('click', function() {
                const instrName = reportBtn.getAttribute("data-name");
                reportInput.value = instrName;
                reportWindow.style.display = "flex";
            })
        });

        closeReportWindow.addEventListener('click', function() {
            reportWindow.style.display = "none";
        });

    </script>


</body>
</html>