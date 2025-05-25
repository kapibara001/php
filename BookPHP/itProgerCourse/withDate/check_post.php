<?php 
    // print_r($_POST);  Array ( [username] => your [usermail] => mind [userpassword] => id [usermessage] => so ahrd )
$name = $_POST["username"];
$email = $_POST["usermail"];
$pass = md5($_POST["userpassword"]); // хэширование пароля
$message = $_POST['usermessage'];
    
if (trim($name) == "") {
    echo "Пустое имя пользователя";
} else if (strlen(trim($name)) <= 2) {
    echo "Слишком короткое имя. Попробуйте снова.";
} else if  (trim($email) == "" || trim($pass) == "" || strlen(trim($pass)) <= 6){
    echo "Некорректныая почта или пароль";
} else {
    // echo "<h1>Вы успешно зарегистрировались!</h1>";
    // $_POST['userpassword'] = $pass;

    // foreach ($_POST as $value) {
    //     echo "<p>$value</p>";
    // }

    header("Location: about.php"); //  Перенаправление на другую страничку в случае успешного прохождения
    exit; // Все то, что стоит ниже данной команды, выполняться не будет
}
