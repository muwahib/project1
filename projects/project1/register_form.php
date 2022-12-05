<?php
include_once("config/db_conn.php");
$database_conn= new db_class;
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $pass=$_POST['cpassword'];
    $user_type=$_POST['user_type'];

    $sql="SELECT * FROM user_form WHERE email='$email' && password='$pass'";
    $results =$database_conn->query($sql);
    $results->execute();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="POST">
            <h3>Register</h3>
            <input type="text" name="name" required placeholder="enter your name">
            <input type="text" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have account?<a href="login_form.php">Login now</a></p>
        </form>
    </div>
</body>
</html>