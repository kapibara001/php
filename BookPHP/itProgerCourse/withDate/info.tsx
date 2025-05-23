/**
 * Для работы с датой есть специальная команда date('данные').
 * Данные пишутся в формате как правильно одной буквы:
 *      d - день в формате 05(если 5 число), 10(если 10 число)
 *      m - месяц в формате 05(если май), 10(если октярбрь)
 *      y - год в формате 25 (если сейчас 2025 год)
 * 
 *      H - часы в формате 05(5 утра), 17(5 вечера)
 *      i - минуты в обычном формате
 *      s - секунды в обычном формате
 * 
 * Если надо написать какие-то запятые, слеши и все прочее - спокойно можно 
 * писать, они будут выводиться как обычный элемент строки.
 * 
 * Пример: date('Дата сейчас: d.m.y') - будет выдано: Дата сейчас: 10.05.25
 * 
 * Остальные буквы-обозначения можно посмотреть на оригинальном сайте PHP - 
 * там все написано.
 * 
 * Если в качестве второго параметра в функцию date("", time()) передать время 
 * time() -  можно будет прибавить например 10000 секунд к функции time() и мы
 * увидим то время, которое будет через 10000 секунд
 * 
 * Пример: date("H:i:s", time() + 10000) - Если сейчас 17:44:25, то будет  
 * выведено 20:31:27(будущее время). Можно также время вычитать
 * 
 * 
 * Команда time() - количество секунд с "начала" - с 1 января 1970 года. (1746898833).
 * Далее с этим числом можно делать что угодно - переводить в часы\минуты\секунды, 
 * добавлять сколько-то секунд для того, чтобы узнать, какое время будет через 
 * столько-то времени, можно отматывать время и все прочее.
 * 
 * 
 * Есть еще команда strtotime(), которая хорошо работает в паре с командой date()
 * Синтаксис(один из примеров): date("m-d H:i:s", strtorime("+10 Minute")) или туда
 * можно написать "+1 Week 10 Hour"
 */