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
if(!$c) die();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>DreamTravel</title>
</head>
<body>
    <div class="header">
    <?php
    include './components/logo.php"';
    include './components/nav.php"';
    ?>
    <h1 style="margin-left:600px;color:#d4a373;"><?= $row['login'] ?></h1>
    <a style="text-decoration: none; color:#f6fff8;margin-left:100px;font-size:18px;" href="./logout.php">Logout</a>
    </div>

<div class="search" style="background-color:#f5ebe0;
width:300px;border-radius:20px;padding:20px; margin-left:500px;
opacity:0.85;color:#432818;">
<h3>Search a travel for you:</h3>
<form action="search.php" method="GET">
    <label for="type">Type</label>
    <br>
    <select name="type" id="type">
        <option value="Sea">Sea</option>
        <option value="Mountains">Mountains</option>
        <option value="Trip">Trip</option>
    </select>
    <br>
    
    <label for="country">Country</label>
    <br>
    <input type="text" name="country" placeholder="Country">
    <br>

    <label for="city">City</label>
    <br>
    <input type="text" name="city" placeholder="City">
<br>
<label for="month">Month</label>
<br>
    <select name="month" id="month">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    <br>
    <button type="submit" name="filters_submit" value="on">Search</button>   
</form>
</div>
<br>
<div class="search" id="search" style="display:flex;flex-direction:row; background-color:#edf2f4;opacity:0.8;text-align: center;width:60%;margin-left:300px;border-radius:20px;">
        <?php
        if(isset($_GET['filters_submit'])){
            $type=$_GET['type'];
            $country=$_GET['country'];
            $city=$_GET['city'];
            $month=$_GET['month'];
        
        $sql="SELECT * FROM destinations
        WHERE type LIKE '%${type}%'
        && country LIKE '%${country}%'
        && city LIKE '%${city}%'
        && month LIKE '%${month}%'";
        $result=mysqli_query($c,$sql);
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
            } }  
            ?>
                
                </div>
    <?php
        include './components/footer.php"';
        ?>
</body>
</html>