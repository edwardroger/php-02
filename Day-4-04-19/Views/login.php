<?php

include('../Controllers/AuthController.php');

$authController = new AuthController();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-submit'])) {
    $response = $authController->login($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
    if (isset($response)) {
        echo $response;
    }
    ?>
    <form action="" method="POST">
        <input type="text" name="email"><br/>
        <input type="password" name="password"><br/>
        <button type="submit" name="login-submit">Login</button>
    </form>
</body>
</html>