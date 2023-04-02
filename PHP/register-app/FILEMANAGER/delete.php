<?php
$c =mysqli_connect('localhost','root','','fileManager');
if (isset ($_POST ['id']) && isset ($_POST ['fileName'])) {
$id = $_POST['id'];
$sql = "DELETE FROM files WHERE id = '$id'";
$fileName = $_POST ['fileName'];
unlink("images/" .$fileName);
if (mysqli_query($c, $sql)) {
     header("Location:./index.php");
} else {
echo 'Something went wrong';}
} else {
header("Location:./index.php");}

