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

                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" name="reCAPTCHA"></div>

                    <div style="text-align: center; margin-top: 10px;">
                        <button class="btn btn-primary" type="submit" name="registration">Зарегистрироваться</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Закрытие/открытие окна регистрации -->
<script> 
    const regWindow = document.getElementById('regwin'); // Само окно регистрации
    const closeRegWindow = document.getElementById('closeRegBtn'); // Крестик в окне регистрации
    const openRegWindow = document.getElementById('1254t'); // Кнопка регистрации сверху справа
    
    closeRegWindow.onclick = function() {
        regWindow.style.display = 'none';
    }

    openRegWindow.onclick = function() {
        regWindow.style.display = 'flex';
    }
</script>