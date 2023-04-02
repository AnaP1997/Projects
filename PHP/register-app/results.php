<?php
//print_r($_POST);
//echo $_POST['fullname'];
if(isset($_POST['submit'])){
    $fullname=htmlspecialchars($_POST['fullname']);
    $age=filter_input(INPUT_POST,'age',FILTER_SANITIZE_NUMBER_INT);
    $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $intrests=filter_var_array($_POST['interests'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $gender=filter_input(INPUT_POST,'gender',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $status=filter_input(INPUT_POST,'status',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $mess=filter_input(INPUT_POST,'mess',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    echo "Register <br>";
    echo"Fullname: ${fullname}<br>";
    echo "Age:${age}<br>";
    echo "Email:${email}<br>";
    foreach($intrests as $interes){
        echo "- ".ucfirst($interes)."<br>";};
        echo "Gender:${gender}<br>";
        echo "Statut:${status}<br>";
        echo "Mesajul tau:${mess}<br>";
}
?>