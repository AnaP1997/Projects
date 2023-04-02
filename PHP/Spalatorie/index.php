<?php
$host='localhost';
$user='root';
$password='';
$db='spalatorie';
$conection=mysqli_connect($host,$user,$password,$db);
if(!$conection){
    die('Connection failed');
}

$sql='SELECT * FROM programare';
$result = mysqli_query($conection,$sql);
//print_r($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPALATORIE</title>
</head>
<body>
 <div style="display:flex; justify-content:center;
 align-items:center;" 
 >
 <a style=" font-size:25px; text-decoration: none; color:#0077b6 " href="./programari.php">Verifica programarile</a>
 <img style="height:300px; width:300px;" src="./carwash.jpg" alt="none">
 <a style=" font-size:25px; text-decoration: none; color:#0077b6 " href="./form.php">Fa o programare!</a>
 
 </div>
</body>
</html>

