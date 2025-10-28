<?php 
session_start();
if(isset($_SESSION['is_login_success']) == false || trim($_SESSION['is_login_success']) == ""){
    header("Location: index.php");
    exit();
}

?>