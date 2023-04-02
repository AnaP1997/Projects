<?php
    require './conection/conection.php';

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
</head>
<body>
    <?php
        include './components/navbar.php';
    ?>
    <h1><?= $row['login'] ?></h1>
    <p><?php echo $row['email'] ?></p>
    <a href="./logout.php">Logout</a>
</body>
</html>