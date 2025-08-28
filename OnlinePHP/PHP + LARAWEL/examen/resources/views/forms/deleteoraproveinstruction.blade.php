<!-- Форма добавления/удаления инструкции -->
<!-- Форма добавления/удаления инструкции -->
<div class="contforaproveordelete" id="cont" style="display: none">
    <div class="smallcontaprove"> 
        <div class="closeCont">
            <p style="text-align: right; margin: 0">
                <img src="https://www.svgrepo.com/show/510921/close-lg.svg" alt="" id="close" style="cursor:pointer">
            </p>
            <h1 style="text-align: center; margin: 0;">
                Добавление/удаление инструкции
            </h1>

            <form action="{{ route('aftercheck') }}" method="POST">
                @csrf
                <div class="input-group flex-nowrap">
                    <input type="text" class="form-control d1" placeholder="Название инструкции" aria-label="Название" name="name" id="name">
                </div>
                <div class="actionbox">
                    <div class="radioContainer">
                        <div class="radioItem">
                            <input type="radio" name="doing" id="delete" value="delete">
                            <label for="delete">Удалить</label>
                        </div>
                        <div class="radioItem">
                            <input type="radio" name="doing" id="add" value="add">
                            <label for="add">Добавить</label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="sendbox">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Вставка названия инструкции в амтоматической форме -->
<script>
    const contWindow = document.getElementById('cont');   
    const closeBtn = document.getElementById('close');    
    const inputName = document.getElementById('name');    

    const actionButtons = document.querySelectorAll('.buttonaction');

    actionButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const instrName = btn.getAttribute("data-name"); 
            inputName.value = instrName;                     
            contWindow.style.display = "flex";               
        });
    });

    // Закрытие окна
    closeBtn.addEventListener('click', function() {
        contWindow.style.display = "none";
    });
</script>
