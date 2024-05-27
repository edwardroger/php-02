<?php include_once './inc/auth/header.php' ?>
<?php
    include './controllers/AuthController.php';

    if (
        $_SERVER['REQUEST_METHOD'] == 'POST'
        && isset($_POST['register'])
    ) {
        $authController = new AuthController();
        $result = $authController->register($_POST);
    }
?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="./images/img-01.png" alt="IMG">
            </div>
            <form class="login100-form validate-form" method="POST">
                <span class="login100-form-title">
                    Member Register
                </span>
                <div class="wrap-input100">
                    <span>
                        <?=
                            // condition ? value1 : value2
                            isset($result['errors']['email'])
                            ? $result['errors']['email']
                            : ''
                        ?>
                    </span>
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100">
                    <span>
                        <?=
                            isset($result['errors']['password'])
                            ? $result['errors']['password']
                            : ''
                        ?>
                    </span>
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100">
                    <span>
                        <?=
                            isset($result['errors']['password'])
                            ? $result['errors']['password']
                            : ''
                        ?>
                    </span>
                    <input class="input100" type="password" name="confirm_password" placeholder="Confirm password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <span>
                    <?= isset($result['response']) ? $result['response'] : '' ?>
                </span>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="register">
                        Register
                    </button>
                </div>
                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once './inc/auth/footer.php' ?>