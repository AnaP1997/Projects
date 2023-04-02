<?php
$c =mysqli_connect('localhost','root','','painterest');

if(isset($_GET['filters_submit'])){
    $imgCategory=$_GET['imgCategory'];

    $sql="SELECT * FROM images
    WHERE category LIKE '%${imgCategory}%'";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painterest</title>
    <style>
        .navbar{
            display:flex;
            align-items:center;
        }
        .navbar input{
            margin-left:20px;
            font-size:20px;
            border-radius:5px;
        }
        .image{
            display: flex;
            flex-direction:row;
            padding: 7px;
            
        }
    </style>
</head>
<body>
    <div class="navbar">
   <?php
   include './logo.php"';
   include './nav.php"';
   ?>
   <form action="./index.php" method="GET">

   <input type="text" placeholder="Search" name="search" required>
   <button name="search_form" value="Search" ><img style="height:15px; width:15px; margin: 3px;" src="./components/serch.png" alt=""></button>
    </form>
   </div>

    <div>
       
    <div>
        <?php
        if(isset($_GET['search_form'])){
            $search=$_GET['search'];
        
            $sql="SELECT * FROM images
            WHERE category LIKE '%${search}%'";
            $result=mysqli_query($c,$sql);
        }else{
        $sql="SELECT * FROM images";
        $result=mysqli_query($c,$sql);}
        if(mysqli_num_rows($result)>0){
       while($row= mysqli_fetch_assoc($result)){
        ?>
        <div class="image">
            <img style="height:300px; width:180px;" src="./images/<?= $row['imgName']?>" alt="">
            <?php

}}?>
        </div>
        
</body>
</html>