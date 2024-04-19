<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-submit'])) {
    $success = false;
    $validUser = [
        'username' => 'admin',
        'password' => 'admin'
    ];

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '') {
        echo 'Vui lòng nhập username';
    }
    if ($password == '') {
        echo  'Vui lòng nhập password';
    }
    
    if ($username == $validUser['username'] && $password == $validUser['password']) {
        $success = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
</head>
<body>
    <h1>
        <?php
            if (isset($success)) {
                if ($success) {
                    echo 'Đăng nhập thành công';
                } else {
                    echo 'Đăng nhập thất bại';
                }
            }
        ?>
    </h1>
    <form action="" method="POST">
        <input type="text" name="username"><br/>
        <input type="password" name="password"><br/>
        <button type="submit" name="login-submit">Đăng nhập</button>
    </form>

    <form action="">

        <button type="submit">Submit</button>
    </form>
</body>
</html>

Bài tập:

Tạo form login kèm giao diện với username và password.
Validate form (nhập trống, < 6 ký tự, > 20 ký tự)
