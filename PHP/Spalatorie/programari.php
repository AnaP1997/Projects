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
    <h1>PROGRAMARI</h1>
 <?php

 if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_assoc($result)){
        echo "
        <p>{$row['nume_masina']}- {$row['nr_imatriculare']}(tel. +{$row['telefon']}): {$row['tip_spalatorie']} --> {$row['data_programare']}  {$row['ora_programare']}</p>
        ";
    }
 }   
 ?>
 
</body>
</html>

