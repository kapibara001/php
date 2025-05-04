<?php 
    $title = "Главная страница";
    require_once "blocks/header.php"; 
?>
<h1>Главная страница</h1>
<?php  
    print_r($_GET); // При использовании метода GET можно динамически имзменять данные через URL т.к данные
    // в методе GET уходят в URL адрес
    require_once "blocks/footer.php"; 
?>