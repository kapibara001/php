<?php 
    $title = "О нас";
    require_once "blocks/header.php";
?>
<!-- <form action="check_post.php" method="POST" class="container"> -->
<form action="check_get.php" method="GET" class="container">
    <h1>О нас</h1>
    <input type="text" placeholder="login" name="username" class="form-control mt-2" required>
    <input type="email" placeholder="mail" name="usermail" class="form-control mt-2">
    <input type="password" placeholder="password" name="userpassword" class="form-control mt-2" required>
    <textarea placeholder="Write message" name="usermessage" class="form-control mt-2"></textarea>

    <input type="submit" value="Отправить" class="btn btn-success mt-2">
</form>
<?php 
    require_once "blocks/footer.php";
?>