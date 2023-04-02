<?php
    require './conection/conection.php';
    session_start();

    if (isset($_SESSION['logged_in_user_id'])) {
        header("Location: ./index.php");
    }

    if (isset($_POST["register"])) {
        $login = FILTER_INPUT(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = FILTER_INPUT(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = FILTER_INPUT(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $password2 = FILTER_INPUT(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);

        if (strlen($login) < 2) {
            $loginError = "Login is too short";
        }

        if (strlen($password) < 4) {
            $passwordError = "Password is too short";
        }

        if ($password !== $password2) {
            $confirmError = "Passwords do not match";
        }

        if (!isset($loginError) && !isset($passwordError) && !isset($confirmError)) {
            $id = uniqid();
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(id, login, email, password)
                    VALUES('$id', '$login', '$email', '$hashedPassword')";

            if (mysqli_query($connection, $sql)) {
                $successMessage = "User created";
            } else {
                $errorMessage = "Something wrong";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php
        include './components/navbar.php';
    ?>
    <div class="register">
        <h1>Register</h1>
        <form action="./register.php" method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <span>
                <?php if(isset($loginError)) echo $loginError; ?>
            </span>
            <br>
            <input type="email" name="email" placeholder="Email" required>
            <span></span>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <span>
                <?php if(isset($passwordError)) echo $passwordError; ?>
            </span>
            <br>
            <input type="password" name="password2" placeholder="Confirm Password" required>
            <span>
                <?php if(isset($confirmError)) echo $confirmError; ?>
            </span>
            <br>
            <button type="submit" name="register" value="register">Register</button>
        </form>
        <p style="color: green"><?php if(isset($successMessage)) echo $successMessage; ?></p>
        <p style="color: red"><?php if(isset($errorMessage)) echo $errorMessage; ?></p>
    </div>
</body>
</html>