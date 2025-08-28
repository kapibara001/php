@vite(['resources/css/newInst.css'])

<div class="bigBlackCont" id="bigBlackCont">
    <div class="bigCont">
        <div class="smallcont">
            <div class="closeCont">
                <p style="text-align: right; margin: 5px 0;">
                    <img src="https://www.svgrepo.com/show/510921/close-lg.svg" alt="" id="close">
                </p>
            </div>
            <h2 style="text-align: center">Загрузка инструкции на портал</h2>
            <form action="{{ route('checkInstruction') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="formFields">
                    <input type="file" class="formField" class="fileLoader" name="instructionFile" style="display: flex; justify-content: center; border: none" id="loadedname">
                    <input type="text" class="formField" placeholder="Название инструкции (подставится автоматически)" name="instructionName" id="filename" readonly>
                    <input type="text" class="formField" placeholder="Описание инструкции" name="instructionDescription">
                    <input type="hidden" value="{{ Auth::user()->username ?? 'Гость' }}" name="uploaded_user"> 
                </div>
                <hr>
                <div class="sendBtn ">
                    <button class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Открытие формы -->
<script>
    const closeBtn = document.getElementById('close'); // Крестик
    const form = document.getElementById('bigBlackCont'); // само окошко
    const openBtn = document.getElementById('loadInstruction'); // Открыть 

    closeBtn.addEventListener('click', function() {
        form.style.display = 'none';
    })

    openBtn.addEventListener('click', function() {
        form.style.display = 'flex';
    })
</script>

<!-- Скрипт по автоматической установке имени -->
<script>
    const loadedname = document.getElementById('loadedname');
    const filename = document.getElementById('filename');

    loadedname.addEventListener('change', function() {
        const file = loadedname.files[0]; // берём выбранный файл
        if (file) {
            const nameOnly = file.name;
            filename.value = nameOnly;
        }
    });
</script>