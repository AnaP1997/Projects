<?php
$c =mysqli_connect('localhost','root','','dream');
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
$sql="SELECT * FROM destinations
    WHERE country='Italy'";
    
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
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    background-image:url('italy.jpg');
    background-size: cover;
}
    </style>
</head>
<body>
    <div class="header">
    <?php
    include './components/logo.php"';
    include './components/nav.php"';
    ?>
    <h1 style="margin-left:650px;color:white;"><?= $row['login'] ?></h1>
    <a style="text-decoration: none; color:#f6fff8;margin-left:100px;font-size:18px;" href="./logout.php">Logout</a>
    </div>
    <nav style="font-size:20px;margin-left:450px;width:500px;background-color:#023e8a;
    color:#caf0f8;">
        <a style=" margin:5px;text-decoration:none;
    color:#caf0f8;" href="./turkey.php">Turkey</a>
        <a style=" margin:5px;text-decoration:none;
    color:#caf0f8;" href="./greece.php">Greece</a>
        <a style=" margin:5px;text-decoration:none;
    color:#caf0f8;" href="./italy.php">Italy</a>
        <a style=" margin:5px;text-decoration:none;
    color:#caf0f8;" href="./moldova.php">Moldova</a>
        <a style=" margin:5px;text-decoration:none;
    color:#caf0f8;" href="./austria.php">Austria</a>
        <a style=" margin:5px;text-decoration:none;
    color:#caf0f8;" href="./switzerland.php">Switzerland</a>
    </nav>
    <div class="italy" id="italy" style="display:flex;flex-direction:row; background-color:#edf2f4;opacity:0.6;text-align: center;">
    <?php
$result = mysqli_query($c,$sql);
if(mysqli_num_rows($result)>0){
   while ($row=mysqli_fetch_assoc($result)){
?><div style="display:flex;flex-direction:column;">
<?php
       echo "
       <h3>{$row['city']}</h3>
       <p>{$row['month']}</p>
       <h4>{$row['hotel']}
       
       <br>"?>
       <img style="height:200px; width:200px;" src="./images/<?= $row['image']?>" alt=""><?php
       echo"
       <br>
       Price{$row['price']}$
       <br>  <p>{$row['description']}</p>
       <button>Reserve</button>
       </div>

       ";

   }
}   
?>
    
    </div>
    
    <?php
        include './components/footer.php"';
        ?>
    
</body>
</html>