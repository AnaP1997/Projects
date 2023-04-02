<?php
    require './conection/conection.php';
    session_start();

    if (isset($_SESSION['logged_in_user_id'])) {
        header("Location: ./index.php");
    }

    if (isset($_POST["login_btn"])) {
        $login = FILTER_INPUT(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = FILTER_INPUT(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "SELECT * FROM users WHERE login = '$login'";

        $result = mysqli_query($connection, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $successMessage = "You're logged in";
                $_SESSION['logged_in_user_id'] = $row['id'];
                header("Location: ./index.php");
            } else {
                $errorMessage = "Something went wrong";
            }
        } else {
            $errorMessage = "Something went wrong";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        include './components/navbar.php';
    ?>
    <div class="login">
        <h1>Login</h1>
        <form action="./login.php" method="POST">
            <input type="text" name="login" placeholder="Login" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" name="login_btn" value="login">Login</button>
        </form>
        <p style="color: green"><?php if(isset($successMessage)) echo $successMessage; ?></p>
        <p style="color: red"><?php if(isset($errorMessage)) echo $errorMessage; ?></p>
    </div>
</body>
</html>