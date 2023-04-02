<?php

$url = 'https://images.unsplash.com/photo-1548335517-4bbe5d780687?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
body
{
background-image:url('<?php echo $url ?>');
}
</style>

</head>
<body>

<?php
 include './login.php"';?>
   

</body>
</html>