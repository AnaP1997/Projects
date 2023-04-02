<?php
$url = 'https://images.unsplash.com/photo-1548335517-4bbe5d780687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80';
require './connection.php';
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
            header("Location: ./home.php");
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
    <style type="text/css">
body
{
background-image:url('<?php echo $url ?>');
}
</style>
</head>
<body>
<div style="display:flex; justify-content:center; margin-top:200px;
margin-left:400px;
border-radius:25px;
 height:300px;
width:650px;
background: linear-gradient(100deg, #e9ecef, #f8f9fa);
 ">
<?php
include './components/logo.php';
include './components/nav.php';?>

<form style="margin-top:40px;
font-size:20px;" action="./login.php" method="POST">
<label for="login">Login</label>
<br>
        <input type="text" name="login" placeholder="Login">
        <br>
        <label for="password">Password</label>
        <br>
        <input type="password" name="password" placeholder="Pasword">
        
        <br>
        <br>
        <button type="submit" name="login_btn" value="login">Login</button>
    </form>
    <p style="color: green"><?php if(isset($successMessage)) echo $successMessage; ?></p>
        <p style="color: red"><?php if(isset($errorMessage)) echo $errorMessage; ?></p>
</div>
</body>
</html>