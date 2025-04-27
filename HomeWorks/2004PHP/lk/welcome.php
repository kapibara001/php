<?php 
session_start();// Тоже надо тут написать
$login = $_SESSION['login'];
echo "Добро пожаловать," . $login . "!";
?>