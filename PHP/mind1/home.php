<?php
$url = 'https://images.unsplash.com/photo-1548335517-4bbe5d780687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80';
    require './connection.php';

    session_start();
    if (!isset($_SESSION['logged_in_user_id'])) {
        header("Location: ./login.php");
    } else {
        $id = $_SESSION['logged_in_user_id'];

        $sql = "SELECT * FROM users WHERE id = '$id'";

        $result = mysqli_query($connection, $sql);
        if ($row = mysqli_fetch_assoc($result)) {

        } else {
            header("Location: ./login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
body
{
background-image:url('<?php echo $url ?>');
}
</style>
</head>
<body>
    <div style="display:flex; justify-content:center;">
    <?php
    include './components/logo.php';
    ?></div>
    <div class="log" style="color:white;margin-left:80px;"><h1><?= $row['login'] ?></h1>
    <p><?php echo $row['email'] ?></p></div>
    <?php
    include './posts.php';
    ?></div>
    
<a href="./logout.php" style="color:white; text-decoration:none; font-size:20px;">Logout</a>
</body>
</html>