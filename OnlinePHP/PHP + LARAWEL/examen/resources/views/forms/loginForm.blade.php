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

                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" name="reCAPTCHA"></div>

                    <div style="text-align: center; margin-top: 10px;">
                        <button class="btn btn-primary" type="submit">Войти</button>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Закрытие/открытие окна регистрации/входа-->
<script>     
    const signWindow = document.getElementById('signwin');
    const closeSignWindow = document.getElementById('closeSignBtn')
    const openSignWindow = document.getElementById('1255t')

    closeSignWindow.onclick = function() {
        signWindow.style.display = 'none';
    }

    openSignWindow.onclick = function() {
        signWindow.style.display = 'flex';
    }

</script>