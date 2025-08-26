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

                @auth
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" name="reCAPTCHA"></div>
                    <input type="hidden" name="reportedUser" value="{{ Auth::user()->username }}">
                @endauth

                <div style="width: 100%; display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

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