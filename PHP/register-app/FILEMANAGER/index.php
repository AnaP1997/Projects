<?php
$c =mysqli_connect('localhost','root','','fileManager');

if (isset($_FILES['file'])){
    $errors=[];
    $fileName=$_FILES['file']['name'];
    $fileSize=$_FILES['file']['size'];
    $fileTmp=$_FILES['file']['tmp_name'];
    $fileType=$_FILES['file']['type'];
    $fileArr=explode('.',$fileName);
    $fileExt=end($fileArr);

    print_r($_FILES['file']);

    echo $fileName,' ',$fileSize,' ',$fileTmp,' ',$fileType,' ',$fileExt;

    $extensions=array("jpeg","jpg","png","gif");
    if(!in_array($fileExt,$extensions)){
        array_push($errors,"File type does not correspond");
    }
    if($fileSize>2000000){
     array_push($errors,"File size greater than 2 MB");
    }
    if(empty($errors)){
        $newFileName=time(). $fileName;
        move_uploaded_file($fileTmp,"images/".$newFileName);
        $id=uniqid();
        $sql="INSERT INTO files(id,fileName) VALUES('$id','$newFileName')";
       
    
    if(mysqli_query($c,$sql)){
        $success="Image uploaded";
        }
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    </head>
<body>
    <div>
        <form action="./index.php" method="POST" enctype="multipart/form-data">
            <label for="file">Select File:<input type="file" name="file" id="file"></label>
            
            <button type="submit">Upload file</button>
        </form>
       <?php
       if(isset($errors) && count($errors)>0){
       foreach($errors as $error){
        ?>
         <p><?= $error?></p>
         <?php
       }}
       ?>
       <p>
        <?=isset($success)?$success: ''?>
       </p>
    </div>
    <div>
        <?php
        $sql="SELECT * FROM files";
        $result=mysqli_query($c,$sql);
        if(mysqli_num_rows($result)>0){
       while($row= mysqli_fetch_assoc($result)){
        ?>
        <div class="image">
            <img src="./css/images/<?= $row['fileName']?>" alt="">

        </div>
        
    <div class="controls">
        <form action="./update.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $row['id']?>">
<input type="hidden" name="fileName" value="<?= $row['fileName']?>">
<label for="newFile">Select File<input type="file" name="newFile" id="newFile"></label>
  <button type="submit">Update file</button>
        </form>

 <form action="./delete.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $row['id']?>">
<input type="hidden" name="fileName" value="<?= $row['fileName']?>">
  <button type="submit">Delete file</button>
        </form>
    </div>
    <?php

       }}?>
    </div>
</body>
</html>