<?php   
    session_start();

    if (isset($_SESSION['logged_in_user_id'])) {
        unset($_SESSION['logged_in_user_id']);
        header("Location: ./login.php");
    }