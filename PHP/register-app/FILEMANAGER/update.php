<?php

  $c = mysqli_connect('localhost', 'root', '', 'fileManager');
if (isset($_FILES['newFile']) && isset($_POST['id'])) {
  $errors = [];

    $fileName = $_FILES['newFile']['name'];

    $fileSize = $_FILES['newFile']['size'];

    $fileTmp = $_FILES['newFile']['tmp_name'];

    $fileType = $_FILES['newFile']['type'];

    $fileArr = explode('.', $fileName);

    $fileExt = end($fileArr);



    // echo $fileName, ' ', $fileSize, ' ', $fileTmp, ' ', $fileType, ' ', $fileExt;



    $extensions = array("jpeg", "jpg", "png", "gif");



    if (!in_array($fileExt, $extensions)) {

      array_push($errors, "File type does not correspond");

    }



    if ($fileSize > 2000000) {

      array_push($errors, "File size greater than 2 MB");

    }



    if (empty($errors)) {

      $newFileName = time() . $fileName;



      $prevFileName = $_POST['fileName'];

      unlink("./images/" . $prevFileName);

      

      move_uploaded_file($fileTmp, "images/" . $newFileName);



      $id = $_POST['id'];

      $sql = "UPDATE files SET fileName = '$newFileName' WHERE id = '$id'";

    if (mysqli_query($c, $sql)) {

        header("Location: ./index.php");

        $success = "Image uploaded";

      }

    } else {

      foreach ($errors as $error) {

        echo "<p>" . $error . "</p>";

      }

    }

  } else {

    header("Location: ./index.php");

  }
