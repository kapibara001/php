<?php 
    $title = "Главная страница";
    require_once "blocks/header.php"; 
?>
<h1>Главная страница</h1>
<?php  
    echo "Сегодняшняя дата: " . date("d.m.y H:i:s", time() + 10000 ) . "<br>";

    echo time() . "<br>"; // Время от 1 янв 1970 в секундах

    echo date("m-d H:i:s", strtotime("+10 Minute")); // Демонстрация работы strtotime вместо time()
    require_once "blocks/footer.php"; 
?>