<?php
session_start();
if(isset($_SESSION['user_data'])){
    unset($_SESSION['user_data']);
    header('location: login_form.php');
}
?>