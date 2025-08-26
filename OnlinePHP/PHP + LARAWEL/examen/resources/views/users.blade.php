<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/users.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Пользователи</title>
</head>
<body>
    <a href="/">Back</a>
    <h1 style="text-align: center;">Список пользователей</h1>
    <div class="bigcont">
        <div class="exampleusers">
            <div>
                <p class="userpunct">Имя пользователя</p>
            </div>
            <div>
                <p class="userpunct">Статус</p>
            </div>
            <div>
                <!-- <p class="userpunct">Дата регистрации</p> -->
            </div>
            <div></div>
            <div class="userpunct" style="margin: 0;"></div>
        </div>

        @foreach ($users as $user)
            <div class="smallcont">

                @if (Auth::check() && Auth::user()->username == $user['username'])
                    <div>
                        <p class="userpunct" id="usernameinform">{{ $user['username'] }}<span style="color: grey">(вы)</span></p>
                    </div>
                @else
                    <div>
                        <p class="userpunct" id="usernameinform">{{ $user['username'] }}</p>
                    </div>  
                @endif

                <div>
                    <p class="userpunct">{{ $user['userstatus'] }}</p>
                </div>
                <div>
                    <!-- <p class="userpunct">Дата регистрации</p> -->
                </div>
                <div></div>
                <div class="doingswithuser" style="margin: 0;" data-name="{{ $user['username'] }}">
                    ...
                </div>
            </div>
        @endforeach
    </div>

    <!-- Окно действий с пользователем -->
    <div class="bgblacker" id="doingWindow" style="display: none">
        <div class="doingWindow">
            <p style="position: fixed; width: 690px; text-align: right; margin-top: 10px; margin-right: 10px;">
                <img src="https://www.svgrepo.com/show/510921/close-lg.svg" alt="" style="width: 30px;" id="closeBtn">
            </p>
            <h2 style="text-align: center; margin: 10px 0">Действия с профилем</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Имя пользователя" aria-describedby="basic-addon1" style="padding: 10px; margin: 0 20px" id="usernameDoing" readonly>
            </div>
            <form action="{{ route('actionWithUser') }}">
                <div class="doingsGroup">
                    <div style="display: flex; justify-content: center; width: 100%">
                        <div>
                            <input type="radio" name="doing" id="delete" value="delete">
                            <label for="delete">Удалить</label>
                        </div>
                        <div>
                            <input type="radio" name="doing" id="block" value="block">
                            <label for="block">Заблокировать</label>
                        </div>
                        <!-- Добавить проверку на блокировку пользователя. Если нет -> кнопки разблокировать нет, вместо нее заблокировать и наоборот.-->
                    <div>
                        <input type="hidden" id="usernameforaction" name="userrname">
                    </div>
                    </div>
                    <hr>
                    <p style="text-align: center">
                        <button type="submit" class="btn btn-primary">Подтвердить</button>
                    </p>
                </div> 
            </form>
        </div>
    </div>

    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif

    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    <!-- Закрытие\открытие окна действий -->
    <script>
        const doingWindow = document.getElementById('doingWindow');
        const closeWindow = document.getElementById('closeBtn');

        const moreBtns = document.querySelectorAll('.doingswithuser');
        const usernameform = document.getElementById('usernameDoing');

        const usernameforaction = document.getElementById('usernameforaction');

        closeWindow.addEventListener('click', function() {
            doingWindow.style.display = 'none';
        })

        moreBtns.forEach(moreBtn => {
            moreBtn.addEventListener('click', function() {
                const username = moreBtn.getAttribute("data-name");
                usernameform.value = username;
                usernameforaction.value = username;
                doingWindow.style.display = 'flex';
            })
        });
    </script>

    
</body>
</html>