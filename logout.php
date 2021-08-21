<?php 
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    session_destroy();
    //echo "Successfully Logged out.";
    header('Location: /cms/');

?>