<?php
  $c=mysqli_connect('localhost','root','','dream');
    session_start();
    if (!isset($_SESSION['logged_in_user_id'])) {
        header("Location: ./login.php");
    } else {
        $id = $_SESSION['logged_in_user_id'];

        $sql = "SELECT * FROM users WHERE id = '$id'";

        $result = mysqli_query($c,$sql);
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
    <link rel="stylesheet" href="./style.css">
    <style>
      html{
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    background-image:url('daniel.jpg');
    background-size: cover;
  
}
    </style>
    <title>DreamTravel</title>
</head>
<body>
    <div class="header">
    <?php
    include './components/nav.php"';
    include './components/logo.php"';
    
    ?>
    <h1 style="margin-left:500px;color:#d4a373;"><?= $row['login'] ?></h1>
    <a style="text-decoration: none; color:#f6fff8;margin-left:100px;font-size:18px;" href="./logout.php">Logout</a>
    </div>
  <div class="home" style="height: 80vh;
  font-weight: bold;">
   <p style="font-size:25px;color:#f6fff8 ; margin-left:500px;">“A day of traveling will bring a basketful of learning.” </p>  
  <h1 style="margin-left:200px;padding-top:50px; color:#f6fff8 ;">Enjoy your dreams with us!</h1>
  <p style="font-size:20px;color:#f6fff8; margin-left:460px;">Dream Travel is an easy business travel platform.</p>
  <p style="font-size:20px;color:#f6fff8 ;margin-left:115px;"> Book and manage complete business trips with the widest range of accommodations,</p> 
 
  <p style="font-size:20px;color:#f6fff8 ;margin-left:300px;">holidays, flights and car rentals from around the world.</p>
  <h4 style=" font-size:20px; padding-top:50px;margin-left:500px; color:#f6fff8 ;">We have special offers for you!!!</h4>
     </div>
     
     
        <?php
        include './components/footer.php"';
        ?>
</body>
</html>