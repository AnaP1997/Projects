<?php
  require './connection.php';
    //session_start();

    //  if (isset($_SESSION['logged_in_user_id'])) {
    //      header("Location: ./posts.php");
    //  }

    if (isset($_POST["post"])) {
        $login = FILTER_INPUT(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
        $post = FILTER_INPUT(INPUT_POST, 'post', FILTER_SANITIZE_EMAIL);

        if (strlen($post) < 2) {
            $PostError = "Post is too short!";
        }

        if (!isset($PostError)) {
            $idd = uniqid();
            $sql = "INSERT INTO posts(idd, id, post)VALUES('$idd',$id,'$post')";

            if (mysqli_query($connection, $sql)) {
                $successMessage = "Post created!";
            } else {
                $errorMessage = "Something wrong!";
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
    <title>MIND</title>
</head>
<body>
<div class="posts" style="margin-top:100px;
margin-left:80px;
border-radius:25px;
height:350px;
width:650px;
background: linear-gradient(100deg, #e9ecef, #f8f9fa);
 ">
 <form action="./home.php" method="POST">
 <h3 style="margin-left:200px;">What's on your mind?</h3>
 <br>
 <input name="post" style="margin-left:150px;height:200px;
width:300px;" type="text" required>
<br>
<button style="margin-left:500px;" type="submit" name="post" value="post">POST</button>
        </form>
        <p style="color: green"><?php if(isset($successMessage)) echo $successMessage; ?></p>
        <p style="color: red"><?php if(isset($errorMessage)) echo $errorMessage; ?></p>
</div> 
<div class="all_posts" style="color:white;margin-left:80px;">
    <?php

if(mysqli_num_rows(mysqli_query($connection, $sql))>0){
   while ($row=mysqli_fetch_assoc((mysqli_query($connection, $sql)))){
       echo "
       <p>{$row['login']}:: {$row['post']}</p>
       ";
   }
}   
?>
</div>
</body>
</html>