<?php

require_once "LOGIN.php";

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} 
catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$query = "SELECT * FROM bank";
$result = $pdo->query($query);

while ($row = $result -> fetch()) {
    echo 'Name: ' . htmlspecialchars($row['name']) . '<br>';
    echo 'Second_name: ' . htmlspecialchars($row['second_name']) . '<br>' . '<br>';
}
?>