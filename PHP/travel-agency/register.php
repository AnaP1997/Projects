<?php
     $c=mysqli_connect('localhost','root','','dream');
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
                    VALUES('$id', '$login','$email', '$hashedPassword')";

            if (mysqli_query($c,$sql)) {
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
    <div class="register" style="
    margin-left:600px;
    width:500px; height:500px;">
        <h1 style="color:#003049;padding:100px 0 0 140px;">Register</h1>
        <form action="./register.php" method="POST" style="padding:20px 0 0 140px;">
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
    <h2 style="margin-left:250px; color:#003049;">Why Dream Travel?</h2>
  <div class="why" style="margin-left:50px;">
    <div class="im">
    <img style="width:100px;height:100px;padding-left:100px;" src="./xmag.png" alt="">
    <img style="width:100px;height:100px; padding-left:150px;" src="./loc.png" alt="">
    <img style="width:100px;height:100px;padding-left:180px;" src="./icon.png" alt="">
    </div>
   <div class="tx" style="display:flex;align-items:row; font-weight: bold;
   font-size:20px; ">
    <p style="padding-left:100px;color:#f6fff8;">Easy booking</p>
    <p style="padding-left:50px;color:#f6fff8;">Visit over 150k destinations</p>
    <p style="padding-left:50px;color:#f6fff8;">Save up to 20% on travel</p>
    </div>
    </div>
    <br>
    <br> 
    <h2 style="margin-left:650px;margin-top:200px; color:#f6fff8;">Create an account to have access to good offers</h2>
    <?php
        include './components/footer.php"';
        ?>
</body>
</html>