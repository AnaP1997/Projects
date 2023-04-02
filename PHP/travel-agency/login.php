<?php
    $c=mysqli_connect('localhost','root','','dream');
    session_start();

    if (isset($_SESSION['logged_in_user_id'])) {
        header("Location: ./index.php");
    }

    if (isset($_POST["login_btn"])) {
        $login = FILTER_INPUT(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = FILTER_INPUT(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "SELECT * FROM users WHERE login = '$login'";

        $result = mysqli_query($c,$sql);
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
    <link rel="stylesheet" href="./style.css">
    <title>DreamTravel</title>
    <style>
      html{
    
    background-image:url('offers.jpg');
    background-size: cover;
}
    </style>
</head>
<body>
    <div class="header">
    <?php
    include './components/logo.php"';
    ?>
    <nav style="font-size:18px; margin:30px; padding:10px; ">
    

    <div   class="links">
            <a style="text-decoration: none; color:#f6fff8 " href="./index.php">Home</a>
            <a style="text-decoration: none; color:#f6fff8 " href="./oferts.php">Offers</a>
            <a style="text-decoration: none; color:#f6fff8 " href="./search.php">Search</a>
            <a style="text-decoration: none; color:#f6fff8 " href="./login.php">Login</a>
            <a style="text-decoration: none; color:#f6fff8 " href="./register.php">Register</a>
               
        </div>
    </nav>
    </div>

    <div class="login" style="
    opacity:0.8; height:800px; margin-left:600px;">
        <h1 style="color:#003049;padding:120px 0 0 140px;">Login</h1>
        <form action="./login.php" method="POST" style="padding:40px 0 0 140px;">
            <input type="text" name="login" placeholder="Login" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" name="login_btn" value="login">Login</button>
        </form>
    <p style="color:white;padding:20px 0 0 140px;">Don't have Login? Go <a  style="color:white; text-decoration:none;"href="./register.php">Register</a></p>
    <p style="color: green"><?php if(isset($successMessage)) echo $successMessage; ?></p>
        <p style="color: red"><?php if(isset($errorMessage)) echo $errorMessage; ?></p>
    </div>
    <?php
        include './components/footer.php"';
        ?>
</body>
</html>