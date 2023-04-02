<?php
$c =mysqli_connect('localhost','root','','painterest');

if (isset($_FILES['file'])){
    $errors=[];
    $imgName=$_FILES['file']['name'];
    $imgSize=$_FILES['file']['size'];
    $imgTmp=$_FILES['file']['tmp_name'];
    $imgType=$_FILES['file']['type'];
    $imgArr=explode('.',$imgName);
    $imgExt=end($imgArr);
    $imgCategory=FILTER_INPUT(INPUT_POST, 'imgCategory', FILTER_SANITIZE_SPECIAL_CHARS);

    print_r($_FILES['file']);

    echo $imgName,' ',$imgSize,' ',$imgTmp,' ',$imgType,' ',$imgExt;

    $extensions=array("jpeg","jpg","png","gif");
    if(!in_array($imgExt,$extensions)){
        array_push($errors,"File type does not correspond");
    }
    if($imgSize>2000000){
     array_push($errors,"File size greater than 2 MB");
    }
    if(empty($errors)){
        $newImgName=time(). $imgName;
        move_uploaded_file($imgTmp,"images/".$newImgName);
        $id=uniqid();
        $sql="INSERT INTO images(id,imgName,category) VALUES('$id','$newImgName','$imgCategory')";
       
    
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
    </style>
</head>
<body>
    <div class="navbar">
   <?php
   include './logo.php"';
   include './nav.php"';
   ?>
   <input type="text" placeholder="Search">
   <button type="submit" ><img style="height:15px; width:15px; margin: 3px;" src="./components/serch.png" alt=""></button>
   </div> 
   <div>
   <form action="./upload.php" method="POST" enctype="multipart/form-data">
            <label for="file">Select File:<input type="file" name="file" id="file"></label>
            <input type="text" name="imgCategory" placeholder="Category ex.Nature" require>
            
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
    
   </div>
</body>
</html>